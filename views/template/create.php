<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Template */
$this->title = 'Создать Шаблон';
$this->params['breadcrumbs'][] = ['label' => 'Шаблоны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$( document ).ready(function() {
    $(':file').filestyle({input: false,buttonText: 'Выбрать файл...'});
});");
?>
<div class="template-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'file' => $file
    ]) ?>

</div>

