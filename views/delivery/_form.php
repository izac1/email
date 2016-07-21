<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;
use app\models\Categories;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Delivery */
/* @var $form yii\widgets\ActiveForm */
?>


<?php
 
$this->registerJs(
   '$("document").ready(function(){ 
		var form = $("#w0")
		.off("submit.yiiActiveForm")
        .on("submit.yiiActiveForm", function(e) {
            if (this !== e.target) {
                return;
            }
            return form.yiiActiveForm("submitForm" , e);
        });

    });'
);
?>

<div class="delivery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'delivery_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'template_id')->dropDownList($templates) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' =>'btn btn-success']) ?>
    </div>



	<?php Pjax::begin(['id'=> 'users']); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],
            'id',
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
        ],
    ]); ?>
    <?php Pjax::end(); ?>
    


    <?php ActiveForm::end(); ?>

</div>
