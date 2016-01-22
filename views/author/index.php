<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Авторы</h1>
<ul>
<?php foreach ($authors as $author): ?>
    <li>
        <?= $author->id ?>
        <?= $author->name ?>
        
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>