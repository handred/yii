<?php

namespace app\controllers;

use app\models\Book;
use app\queue\TestQueue;
use Yii;
use yii\queue\file\Queue;
use yii\web\Controller;
use yii\web\UploadedFile;

class BookController extends Controller
{

    public function actionIndex()
    {

        Yii::$app->queue->push(new TestQueue([
                'content' => Date('Y-m-d H:i:s'),
                'file' => Yii::$app->basePath . '/web/uploads/testqueue.txt',
        ]));


        /** @var Queue $queue */
//        $queue = Yii::$app->queue;
//        $queue->run();

        $user = Yii::$app->user->identity;
        return $this->render('index', ['user' => $user, 'books' => Book::find()->cache(1000)->all(), 'model' => new Book]);
    }

    public function actionCreate()
    {

        $user = Yii::$app->user->identity;

        if (!$user->id) {
            return $this->redirect(['site/login']);
        }

        if (!Yii::$app->request->isPost) {
            return $this->redirect(['index']);
        }

        $model = new Book;

        if (!$model->load(\Yii::$app->request->post()) ||
                !$model->validate()) {
            return $this->render('index', ['user' => $user, 'books' => Book::find()->all(), 'model' => $model]);
        }

        if ($model->photo = UploadedFile::getInstance($model, 'photo')) {
            $model->photo = $model->uploadphoto();
        }

        $model->user = $user->id;
        $model->insert();

        $this->redirect(['index']);
    }

    public function actionCheckbox()
    {
        if (\Yii::$app->request->isPjax && $id = \Yii::$app->request->post('id')) {

            $model = Book::findOne($id);
            $user = Yii::$app->user->identity;
            $model->onbase = !$model->onbase;
            $model->save();
            return $this->render('_checkbox', ['item' => $model, 'user' => $user]);
        }
    }

}