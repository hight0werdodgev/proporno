<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_tag}}`.
 */
class m210124_054747_create_article_tag_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%article_tag}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%article_tag}}');
    }
}
