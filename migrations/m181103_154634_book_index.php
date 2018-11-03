<?php

use yii\db\Migration;

/**
 * Class m181103_154634_book_index
 */
class m181103_154634_book_index extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
        $this->alterColumn(
            'book',
            'year',
            'integer NOT NULL'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
          $this->alterColumn(
            'book',
            'year',
            'date'
        );
    }

}
