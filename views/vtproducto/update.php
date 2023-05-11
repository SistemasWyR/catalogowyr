<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vtproducto */

$this->title = 'Update Vtproducto: ' . $model->prindice;
$this->params['breadcrumbs'][] = ['label' => 'Vtproductos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prindice, 'url' => ['view', 'prindice' => $model->prindice]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vtproducto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
