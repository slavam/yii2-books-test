<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'author_id',
            'created_at',
            'updated_at',
            'preview',
            'issue',
        ],
    ]) ?>

</div>
