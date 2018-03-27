<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png,gif']
        ];
    }

    public function uploadFile(UploadedFile $file, $currentImage)
    {
        $this->image = $file;
        if ($this->validate()) {
            $this->deleteCurrentImage($currentImage);
            return $this->saveImage();
        }
    }

    private function getFolder()
    {
        return Yii::getAlias('@web') . 'uploads/';
    }

    private function generateFilename()
    {
        $this->image->name = strtolower($this->image->name);
        if (true === $this->fileExists($this->image->name)) {
            $this->image->name = ($this->image->baseName . '_1.' . $this->image->extension);
            return $this->generateFilename();
        }
        return $this->image->name;
    }

    public function deleteCurrentImage($currentImage)
    {
        if (true === $this->fileExists($currentImage)) {
            unlink($this->getFolder()  .$currentImage);
        }
    }

    private  function fileExists($currentImage)
    {
        if (!empty($currentImage) && $currentImage != null) {
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    private function saveImage()
    {
        $filename = $this->generateFilename();
        $this->image->saveAs($this->getFolder() . $filename);
        return $filename;
    }
}