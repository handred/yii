<?php

use yii\db\Migration;

/**
 * Class m181103_072419_book_index
 */
class m181103_072419_book_index extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'user',
            'book',
            'user'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         $this->dropIndex(
            'user',
            'book'
        );
    }

}
