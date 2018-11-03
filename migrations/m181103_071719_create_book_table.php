<?php

use yii\db\Migration;

/**
 * Handles the creation of table `book`.
 */
class m181103_071719_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(),
            'name' => $this->string(),
            'year' => $this->date(),
            'photo' => $this->string(),
            'onbase' => $this->integer(),
            'user' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('book');
    }
}
