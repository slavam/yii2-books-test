<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Книги');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php  \yii\widgets\Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'author_id' => [
                'attribute'=>'author_id',
                'value'=>'author.name',
                'filter'=>ArrayHelper::map(\app\models\Author::find()->orderBy('name')->all(), 'id', 'name'),
            ],
            'created_at',
            'preview'             =>[
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'preview',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a(Html::img('images/'.$data->preview, ['height'=>'50']),'show&id='.$data->id);;
                },
            ],
            
            'issue',

            //  ['class' => 'yii\grid\ActionColumn'],
            [   'class' => 'yii\grid\ActionColumn', 
                'template' => '{view} {update} {delete}',
                'headerOptions' => ['width' => '20%', 'class' => 'activity-view-link',],        
                'contentOptions' => ['class' => 'padding-left-5px'],

                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>','#', [
                            'class' => 'activity-view-link',
                            'title' => Yii::t('yii', 'View'),
                            'data-toggle' => 'modal',
                            'data-target' => '#activity-modal',
                            'data-id' => $key,
                            'data-pjax' => '0',
                        ]);
                    },
                ],

            ],

        ],
    ]); ?>

<?php  \yii\widgets\Pjax::end(); ?>

</div>

<?php $this->registerJs(
    "$('.activity-view-link').click(function() {
    $.get(
        'viewm',         
        {
            id: $(this).closest('tr').data('key')
        },
        function (data) {
            
            $('#activity-modal').find('.modal-body').html(data);
            $('#activity-modal').modal();
        }  
    );
});
    "
); ?>

<?php yii\bootstrap\Modal::begin([
    'id' => 'activity-modal',
    'header' => '<h4 class="modal-title">Просмотр</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Закрыть</a>',

]); ?>

<div class="well">


</div>

<?php yii\bootstrap\Modal::end(); ?>
