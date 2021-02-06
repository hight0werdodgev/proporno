<?php


namespace app\models;


use Yii;
use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class CoverImage extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png']
        ];
    }

    public function uploadFile(UploadedFile $file, $currentImage, $id)
    {
        $this->image = $file;

        if ($this->validate())
        {
            if (!is_dir(Yii::getAlias('@web') . 'upload/images/articles/cover/' . $id))
            {
                FileHelper::createDirectory(Yii::getAlias('@web') . 'upload/images/articles/cover/' . $id);
            }

            if (file_exists(Yii::getAlias('@web') . 'upload/images/articles/cover/' . $id . '/' . $currentImage) && !is_dir(Yii::getAlias('@web') . 'upload/images/articles/cover/' . $id . '/' . $currentImage))
            {
                unlink(Yii::getAlias('@web') . 'upload/images/articles/cover/' . $id . '/' . $currentImage);
            }

            $filename = md5(uniqid($file->baseName)) . '.' .$file->extension;

            $file->saveAs(\Yii::getAlias('@web') . 'upload/images/articles/cover/' . $id . '/' . $filename);

            return $filename;
        }
    }
}