<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Шаблоны';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="template-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Создать шаблон', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'template_name',
            'template_title',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
