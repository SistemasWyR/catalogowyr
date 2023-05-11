<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VtproductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vtproducto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'prindice') ?>

    <?= $form->field($model, 'prcodigo') ?>

    <?= $form->field($model, 'prnombre') ?>

    <?= $form->field($model, 'prfeccrea') ?>

    <?= $form->field($model, 'prgrupo') ?>

    <?php // echo $form->field($model, 'prsubgrupo') ?>

    <?php // echo $form->field($model, 'prunimed') ?>

    <?php // echo $form->field($model, 'prmarca') ?>

    <?php // echo $form->field($model, 'prcosto') ?>

    <?php // echo $form->field($model, 'prstkrepo') ?>

    <?php // echo $form->field($model, 'prstkmaximo') ?>

    <?php // echo $form->field($model, 'prdescontinuar') ?>

    <?php // echo $form->field($model, 'prenoferta') ?>

    <?php // echo $form->field($model, 'prnumeroserie') ?>

    <?php // echo $form->field($model, 'pruser') ?>

    <?php // echo $form->field($model, 'prfecha') ?>

    <?php // echo $form->field($model, 'prhora') ?>

    <?php // echo $form->field($model, 'prsinstock') ?>

    <?php // echo $form->field($model, 'prcostoreal') ?>

    <?php // echo $form->field($model, 'prUnixEmb') ?>

    <?php // echo $form->field($model, 'prcambiaingreso') ?>

    <?php // echo $form->field($model, 'prMargenBase') ?>

    <?php // echo $form->field($model, 'prdeparta') ?>

    <?php // echo $form->field($model, 'prpik') ?>

    <?php // echo $form->field($model, 'prextincion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
