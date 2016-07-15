<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Delivery;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title =  $dataProvider->query->where["status"] == 1 ?  'Список успешной рассылки ' .$model->id  : 'Список не успешной рассылки ' .$model->id; 

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'delivery_name',
             [
             	//'format'=>'html',
             	'label'=>'ФИО',
             	'value'=> function($model){
                	return  $model->user->firstname.' '.$model->user->lastname;
                }
            ],
            [
            	//'format'=>'html',
            	'label'=>'Email',
            	'value'=> function($model){
                	return $model->user->email;
                }
            ],
        ],
    ]); ?>
</div>
