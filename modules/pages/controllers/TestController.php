<?php

namespace app\modules\pages\controllers;

use yii\web\Controller;

/**
 * Default controller for the `Pages` module
 */
class TestController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return 'test';
        //return $this->render('index');
    }
}
