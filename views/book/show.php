<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Files'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-view">

    <h1><?php echo Html::encode($this->title) ?></h1>
    
    <?= Html::img('images/'.$model->preview, ['alt'=>'some', 'class'=>'thing']);?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' .Yii::t('app', 'Список'), ['index'], ['class' => 'btn btn-default']) ?>
    </p>


</div>
