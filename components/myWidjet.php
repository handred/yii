<?php

namespace app\components;

use yii\base\Widget;

class myWidjet extends Widget
{
    public $name;
    public $name1;
    
    public function init(){
        if($this->name === null){
            $this->name = 'null';
        }
        ob_start();
    }
    public function  run(){
        $content = ob_get_clean();
        //return $this->name.' TESTTEST';
        return mb_strtoupper($content). $this->render('my',['name' => $this->name]);
    }
}
