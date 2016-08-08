<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Delivery;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $dataProvider->query->where[2]["status"]== 1 ?  'Список успешной рассылки ' .$model->delivery_name  : 'Список не успешной рассылки ' .$model->delivery_name; 

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             [
                'attribute'=>'user_id',
             	'label'=>'ФИО',
             	'value'=> function($model){
                	return  $model->user->first_name.' '.$model->user->last_name;
                }
            ],
            [
            	'label'=>'Email',
            	'value'=> function($model){
                	return $model->user->email;
                }
            ],
        ],
    ]); ?>
</div>
