<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m181208_100018_create_page_table extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'body' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('page');
    }

}
