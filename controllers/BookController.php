<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class BookController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    
    public function rules()
    {
        return [
            [['name', 'fio', 'year','photo', 'user'], 'required'],
            [['user'], 'integer'],
            [['name', 'fio', 'photo'], 'string', 'max' => 255]
        ];
    }
    
}
