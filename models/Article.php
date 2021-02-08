<?php

namespace app\models;

use app\metamodels\SlugBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

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
 * @property string $image
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
            [['status'], 'default', 'value' => 0],
            [['date_of_change'], 'default', 'value' => date('Y-m-d')],
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
            'user_id' => 'Автор',
            'category_id' => 'Категория',
            'viewed' => 'Просмотров',
        ];
    }

    public function saveImage($filename)
    {
        $this->image = $filename;

        return $this->save(false);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function saveCategory($category_id)
    {
        $category = Category::findOne($category_id);
        if ($category != null)
        {
            $this->link('category', $category);
            return true;
        }

    }

    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->viaTable('article_tag', ['article_id' => 'id']);
    }

    public function getSelectedTags()
    {
        $selectedTags = $this->getTags()->select('id')->asArray()->all();

        return ArrayHelper::getColumn($selectedTags, 'id');
    }

    public function saveTags($tags)
    {
        if (is_array($tags))
        {
            ArticleTag::deleteAll(['article_id' => $this->id]);

            foreach ($tags as $tag_id)
            {
                $tag = Tag::findOne($tag_id);
                $this->link('tags', $tag);
            }

            return true;
        }
    }
}
