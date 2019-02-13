<?php

namespace app\controllers;


use app\models\Article;
use app\models\Category;
use yii\web\Controller;

class SearchController extends Controller
{
    public function actionSearch()
    {
        $query = trim(\Yii::$app->request->get('query'));
        if (empty($query)) {
            return $this->render('search', ['query' => $query]);
        }

        $data = Article::search($query);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();
        return $this->render('search', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'query' => $query,
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories
        ]);
    }
}