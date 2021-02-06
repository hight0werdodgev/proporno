<?php

use yii\helpers\Url;

?>
<p><a href="<?= Url::to(['/admin/article/index'])?>">Статьи</a></p>
<p><a href="<?= Url::to(['/admin/category/index'])?>">Категории</a></p>
<p><a href="<?= Url::to(['/admin/tag/index'])?>">Тэги</a></p>
<p><a href="<?= Url::to(['/admin/comment/index'])?>">Комментарии</a></p>