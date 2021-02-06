<?php

namespace app\models;

use app\metamodels\SlugBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 */
class Tag extends ActiveRecord
{

    use SlugBehavior;

    public static function tableName()
    {
        return 'tag';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'slug'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Имя',
            'slug' => 'Slug',
        ];
    }
}
