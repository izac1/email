<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Template */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="template-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'template_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($file, 'templateFile')->fileInput() ?>
   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Измеминить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
