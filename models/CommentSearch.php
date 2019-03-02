<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

class CommentSearch extends Comment
{
    public function rules()
    {
        return [
            [['id', 'user_id', 'article_id', 'status'], 'integer'],
            [['text', 'date'], 'safe']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Comment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);



        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'article_id' => $this->article_id,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}