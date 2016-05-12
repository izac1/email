<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Изменить пользывателя: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пользыватели', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'categories'=>  ArrayHelper::map(Categories::find()->all(), 'id', 'name')
    ]) ?>
    <?= var_dump($model->category->name); ?>

</div>
