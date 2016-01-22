<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Author;

class AuthorController extends Controller
{
    public function actionIndex()
    {
        $query = Author::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $authors = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'authors' => $authors,
            'pagination' => $pagination,
        ]);
    }
}