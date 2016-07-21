<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Template;


/* @var $this yii\web\View */
/* @var $model app\models\Delivery */

$this->title = 'Создание Рассылки ';
$this->params['breadcrumbs'][] = ['label' => 'Рассылки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'templates' => ArrayHelper::map(Template::find()->all(), 'id', 'template_name'),
        'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
    ]);?>

</div>
