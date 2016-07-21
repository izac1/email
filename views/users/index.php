<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользыватели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать пользывателя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'first_name',
            'last_name',
            'email:email',
            [
            'attribute'=>'category_id',
            'value'=> function($model){
                return $model->category->name;
                },
            'filter' => ArrayHelper::map(Categories::find()->all(), 'id', 'name')
            ],
             [
                'attribute' => 'is_active',
                'format' => 'boolean',
                'filter' => [1 => 'Да', 0 => 'Нет'],
            ],
            [
                'attribute' => 'is_demo',
                'format' => 'boolean',
                'filter' => [1 => 'Да', 0 => 'Нет'],
            ],
            [
                'attribute' => 'is_subscribe',
                'format' => 'boolean',
                'filter' => [1 => 'Да', 0 => 'Нет'],
            ],
            [
                'attribute' => 'is_online',
                'format' => 'boolean',
                'filter' => [1 => 'Да', 0 => 'Нет'],
            ],
            [
                'attribute' => 'is_widget',
                'format' => 'boolean',
                'filter' => [1 => 'Да', 0 => 'Нет'],
            ],
             'version',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{delete} {update}'
            ],
        ],
    ]); ?>
</div>
