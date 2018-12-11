<?php

use yii\db\Migration;

/**
 * Class m181211_171932_item
 */
class m181211_171932_items extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {

        $this->createTable('item', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'page_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex('item_page_id', 'item', 'page_id');

        $this->addForeignKey('item_page_id', 'item', 'page_id', 'page', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {

        $this->dropForeignKey('item_page_id', 'item');
        $this->dropIndex('item_page_id', 'item');
        $this->dropTable('item');
    }

}
