<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Book;
use app\models\User;

class BookController extends Controller {

    public function actionIndex() {
        $user = Yii::$app->user->identity;
        return $this->render('index', ['user'=>$user, 'books'=>Book::find()->all(), 'model'=> new Book()]);
    }
    
}
