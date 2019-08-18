<?php
/**
 * Created by PhpStorm.
 * User: Vaharsolta
 * Date: 18.08.2019
 * Time: 19:59
 */

namespace app\modules\admin\controllers;


use Exception;
use Yii;

class BotRecognizer
{
    /**
     * @var string file where bot definitions keeping
     */
    public $botsFile;

    /**
     * @var string keeps bot name
     */
    private $botName;

    /**
     * @var boolean keeps is user bot or not
     */
    private $isBot;

    /**
     * @var boolean keeps data if checking already done or not, to not checking twice
     */
    private $botVerifyChecked = false;

    /**
     * function to determine if user is bot by ip address and useragent
     * @return boolean if user is bot or not
     */
    public function getIsBot () {
        $userAgent = Yii::app()->request->getUserAgent();
        $ip = Yii::app()->request->getUserHostAddress();

        if ( !$ip || !$userAgent ) {
            return false;
        }

        $ipLong = ip2long($ip);
        $botsInfo = $this->_getBotsInfo();

        if ( !sizeof($botsInfo) ) {
            return false;
        }

        foreach( $botsInfo AS $botName => $ary ) {
            $this->botName = $botName;

            foreach ( $ary AS $data ) {
                $this->isBot = ( $ipLong >= ip2long($data['botIpStart']) ) && ( $ipLong <= ip2long($data['botIpEnd']) );
                if ( !$this->isBot ) {
                    $this->isBot = ( stripos( $userAgent,  $data['botAgent'] ) !== false );
                }

                if( $this->isBot ) {
                    return true;
                }
            }
        }

        $this->botVerifyChecked = true;
        $this->botName = false;
        return false;
    }

    /**
     * get bot name (i.e. GoogleBot, YandexBot etc)
     * @return mixed bot name if is bot or false if is not bot
     */
    public function getBotName () {
        if ( $this->botVerifyChecked ) {
            return $this->botName;
        } elseif ( $this->getIsBot() ) {
            return $this->botName;
        }

        return false;
    }

    /**
     * get bot ip
     * @return string ip of bot
     */
    public function getBotIp () {
        return Yii::app()->request->getUserHostAddress();
    }

    /**
     * get useragent of bot
     * @return string user agent of bot
     */
    public function getBotUserAgent () {
        return Yii::app()->request->getUserAgent();
    }

    /**
     * get bot definitions from file, put them to cache and return it
     * @return array
     */
    private function _getBotsInfo () {
        if ( ( $botsInfo = Yii::app()->cache->get('botsRecognizer_botsInfo') ) === false ) {
            $botsInfo = $this->_readBotsFile();
            Yii::app()->cache->set('botsRecognizer_botsInfo', $botsInfo);
        }
        return $botsInfo;
    }

    /**
     * read bot definitions file
     * @return array with bot definitions
     * @throws Exception when no file exists
     */
    private function _readBotsFile() {
        if ( $this->botsFile ) {
            $file = $this->botsFile;
        } else {
            $file = dirname(__FILE__) .'/bots.txt';
        }
        if ( !file_exists($file) ) {
            throw new Exception('Bots file not found');
        }

        $retArray = array();
        $lines = @file($file);
        foreach( $lines AS $line ) {
            $arr = explode('|', trim($line));
            if( sizeof($arr) < 4 ) {
                continue;
            }
            $botName = trim($arr[0]);
            $ip1 = $this->_fromIpToX32(trim($arr[1]));
            $ip2 = $this->_fromIpToX32(trim($arr[2]));
            $agent = trim($arr[3]);

            $retArray[$botName][] = array(
                'botName' => $botName,
                'botIpStart' => $ip1,
                'botIpEnd' => $ip2,
                'botAgent' => $agent,
            );
        }

        return $retArray;
    }

}