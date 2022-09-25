<?php

namespace frontend\controllers;

use common\models\Post;

class PostController extends \yii\web\Controller
{
    public function actionIndex()
    {
        // get records from Post table
        $posts = Post::find()->where(['status' => 1]);

        // get pagination
        $pagination = new \yii\data\Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $posts->count(),
        ]);

        // get posts with pagination
        $posts = $posts->orderBy('created_at DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', compact('posts', 'pagination'));
    }

    public function actionView($id)
    {
        // get record from Post table
        $post = Post::findOne($id);

        return $this->render('view', compact('post'));
    }

}
