<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property string|null $content
 * @property string|null $meta_description
 * @property int|null $status
 * @property string|null $date_of_creation
 * @property string|null $date_of_change
 */
class Article extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'content', 'meta_description'], 'string'],
            [['status'], 'integer'],
            [['date_of_change'], 'safe'],
            [['date_of_creation'], 'default', 'value' => date('Y-m-d')],
            [['title', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'content' => 'Content',
            'meta_description' => 'Meta Description',
            'status' => 'Status',
            'date_of_creation' => 'Date Of Creation',
            'date_of_change' => 'Date Of Change',
        ];
    }
}
