<?php

namespace app\queue;

use yii\base\BaseObject;

class TestQueue extends BaseObject implements \yii\queue\JobInterface
{
    public $content;
    public $file;

    public function execute($queue)
    {
        //sleep(10);
        file_put_contents($this->file, $this->content.' - '.date('Y-m-d H:i:s').PHP_EOL, FILE_APPEND);
    }

}
