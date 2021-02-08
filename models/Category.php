<?php

namespace app\models;

use app\metamodels\SlugBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property string|null $meta_description
 */
class Category extends ActiveRecord
{

    use SlugBehavior;

    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'meta_description'], 'string'],
            [['title', 'slug'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'slug' => 'Slug',
            'description' => 'Описание',
            'meta_description' => 'Описание для meta description',
        ];
    }

    public function getArticles()
    {
        return $this->hasMany(Article::class, ['category_id' => 'id']);
    }
}
