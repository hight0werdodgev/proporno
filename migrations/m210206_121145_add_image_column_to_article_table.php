<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article}}`.
 */
class m210206_121145_add_image_column_to_article_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('article', 'image', 'string');
    }

    public function safeDown()
    {
        $this->dropColumn('article', 'image');
    }
}
