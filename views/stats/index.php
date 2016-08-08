<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Delivery;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статистика';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'delivery_name',
             [
             	'format'=>'html',
             	'label'=>'Доставленно',
             	'value'=> function($model){
                	return  '<a href="'. Url::toRoute(['/stats/sucess', 'id' => $model->id]).'">'.Delivery::find()->where(['delivery_name'=>$model->delivery_name,'status'=>1])->count()."</a>";
                }
            ],
            [
            	'format'=>'html',
            	'label'=>'Не доставлено',
            	'value'=> function($model){
                	return  '<a href="'. Url::toRoute(['/stats/error', 'id' => $model->id]).'">'.Delivery::find()->where(['delivery_name'=>$model->delivery_name,'status'=>2])->count()."</a>";
                }
            ],
        ],
    ]); ?>
</div>
