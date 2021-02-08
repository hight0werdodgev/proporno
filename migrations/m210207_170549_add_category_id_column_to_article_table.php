<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article}}`.
 */
class m210207_170549_add_category_id_column_to_article_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('article', 'category_id', 'integer');
    }

    public function safeDown()
    {
        $this->dropColumn('article', 'category_id');
    }
}
