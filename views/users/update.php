<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Измeнение пользывателя: ' . $model->first_name .' '.$model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Пользыватели', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->first_name .' '.$model->last_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение пользывателя '.$model->first_name .' '.$model->last_name;
?>
<div class="users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories'=>  ArrayHelper::map(Categories::find()->all(), 'id', 'name')
    ]) ?>

</div>
