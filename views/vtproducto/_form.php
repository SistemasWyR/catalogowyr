<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vtproducto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vtproducto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prcodigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prnombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prfeccrea')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prgrupo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prsubgrupo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prunimed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prmarca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prcosto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prstkrepo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prstkmaximo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prdescontinuar')->textInput() ?>

    <?= $form->field($model, 'prenoferta')->textInput() ?>

    <?= $form->field($model, 'prnumeroserie')->textInput() ?>

    <?= $form->field($model, 'pruser')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prfecha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prhora')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prsinstock')->textInput() ?>

    <?= $form->field($model, 'prcostoreal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prUnixEmb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prcambiaingreso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prMargenBase')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prdeparta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prpik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prextincion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
