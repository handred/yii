<?php

namespace app\modules\pages;

/**
 * Pages module definition class
 */
class Module extends \yii\base\Module {

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\pages\controllers';

    /**
     * {@inheritdoc}
     */
    public function init() {
        parent::init();

        $this->params['foo'] = 'bar';
        $this->defaultRoute = 'index/index';

        //'defaultRoute' => 'user/index'
        // custom initialization code goes here
    }

}
