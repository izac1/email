<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Создать пользывателя';
$this->params['breadcrumbs'][] = ['label' => 'Пользыватели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories'=>  ArrayHelper::map(Categories::find()->all(), 'id', 'name'),
    ]) ?>

</div>
