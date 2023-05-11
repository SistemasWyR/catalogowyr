<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vtproducto */

$this->title = $model->prindice;
$this->params['breadcrumbs'][] = ['label' => 'Vtproductos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vtproducto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'prindice' => $model->prindice], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'prindice' => $model->prindice], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'prindice',
            'prcodigo',
            'prnombre',
            'prfeccrea',
            'prgrupo',
            'prsubgrupo',
            'prunimed',
            'prmarca',
            'prcosto',
            'prstkrepo',
            'prstkmaximo',
            'prdescontinuar',
            'prenoferta',
            'prnumeroserie',
            'pruser',
            'prfecha',
            'prhora',
            'prsinstock',
            'prcostoreal',
            'prUnixEmb',
            'prcambiaingreso',
            'prMargenBase',
            'prdeparta',
            'prpik',
            'prextincion',
        ],
    ]) ?>

</div>
