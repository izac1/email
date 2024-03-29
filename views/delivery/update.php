<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Delivery */

$this->title = 'Редактирывание рассылки: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Рассылка', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирывание рассылки';
?>
<div class="delivery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
