<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рассылка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать Рассылку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'delivery_name',
            //'title',
             ['attribute'=>'user_id',
            'value'=> function($model){
                return $model->user->first_name .' '.  $model->user->last_name .' '.  $model->user->email ;
                }
            ],
            ['attribute'=>'status',
             'format'=>'html',
            'value'=> function($model){
                return $model->getStatus();
                }
            ],
            ['attribute'=>'template_id',
            'value'=> function($model){
                return $model->template->template_name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{delete}'
            ],
        ],
    ]); ?>
</div>
