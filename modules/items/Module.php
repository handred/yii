<?php

namespace app\modules\items;

/**
 * items module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\items\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        
        $this->params['foo'] = 'bar';
        $this->defaultRoute = 'index/index';

        // custom initialization code goes here
    }
}
