<?php

namespace app\modules\pages\controllers;

use yii\web\Controller;

/**
 * Default controller for the `Pages` module
 */
class IndexController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        //return 'index';
        return $this->render('index');
    }
}
