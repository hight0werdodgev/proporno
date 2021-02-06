<?php

namespace app\models;

use app\metamodels\SlugBehavior;
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

    use SlugBehavior;

    public static function tableName()
    {
        return 'article';
    }

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

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'slug' => 'Slug',
            'description' => 'Описание',
            'content' => 'Содержание',
            'meta_description' => 'Описание для meta description',
            'status' => 'Статус',
            'date_of_creation' => 'Дата создания',
            'date_of_change' => 'Дата последнего изменения',
        ];
    }
}
