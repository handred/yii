<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Book;
use app\models\User;
use yii\web\UploadedFile;

class BookController extends Controller {

    public function actionIndex() {
        
        $this->checkpost();
        
        $user = Yii::$app->user->identity;
        return $this->render('index', ['user' => $user, 'books' => Book::find()->all(), 'model' => new Book]);
    }

    private function checkpost() {
        $user = Yii::$app->user->identity;

        if (!$user->id) {
            return;
        }

        if (!Yii::$app->request->isPost) {
            return;
        }
        
        $model = new Book;

        $model->load(\Yii::$app->request->post());
        
        if (!$model->validate()) {
            return;
        }

        if ($model->photo = UploadedFile::getInstance($model, 'photo')) {
                $model->photo = $model->uploadphoto();
        }
        
        $model->user = $user->id;
        $model->insert();
    }

}
