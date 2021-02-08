<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article}}`.
 */
class m210207_170604_add_viewed_column_to_article_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('article', 'viewed', 'integer');
    }

    public function safeDown()
    {
        $this->dropColumn('article', 'viewed');
    }
}
