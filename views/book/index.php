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




<?php Modal::begin([
 'id' => 'preview-modal',
 'header' => '<h4 class="modal-title">Просмотр</h4>',
//  'toggleButton' => ['label'=> 'Window'],
 'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Закрыть</a>',
]); 

Modal::end(); ?>


<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


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
                    return Html::img('images/'.$data->preview, ['height'=>'50']);
                    
                },
            ],
            
            'issue',

             ['class' => 'yii\grid\ActionColumn'],
            // [
            //     'class' => \yii\grid\ActionColumn::className(),
            //     'buttons' => [
            //         'view' => function ($url, $model, $key) {
            //             return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '#', [
            //                 'class' => 'preview-link',
            //                 'title' => 'Просмотр',
            //                 'data-toggle' => 'modal',
            //                 'data-target' => '#preview-modal',
            //                 'data-id' => $key,
            //                 'data-pjax' => '0',
            //             ]);
            //         },
            //     ],
            // ]

        ],
    ]); ?>

</div>


<?php
$loadUrl = \yii\helpers\Url::to('index.php?r=book/view');    //('/book/view');
$js = <<<JS
$('.preview-link').click(function() {

    $.get(
        "{$loadUrl}",
        {
            id: $(this).closest('tr').data('key')
        },
        function (data) {
        
            $('.modal-body','#preview-modal').html(data);
            $('#preview-modal').modal();
        }
    );
});
JS;
$this->registerJs($js);
?>
