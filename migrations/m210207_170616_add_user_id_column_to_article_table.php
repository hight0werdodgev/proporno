<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article}}`.
 */
class m210207_170616_add_user_id_column_to_article_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('article', 'user_id', 'integer');
    }

    public function safeDown()
    {
        $this->dropColumn('article', 'user_id');
    }
}
