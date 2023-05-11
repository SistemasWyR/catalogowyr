<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use app\models\VtproductoSearch;
use app\models\Vtproducto;
use app\models\Vtfoto;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VtproductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogo Web - seleccione Producto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vtproducto-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php
            $vacio = 0;
            $model_vtproducto = Vtproducto::find()->where(['prcodigo'=> $searchModel->prcodigo])->all();
            if (empty($model_vtproducto) && !empty($searchModel->prcodigo)) {$vacio = 1;}
            else {
                $model_vtproducto = Vtproducto::find()->where(['prgrupo'=> $searchModel->prgrupo])->all();
                if (empty($model_vtproducto) && !empty($searchModel->prgrupo)) {$vacio = 1;} 
                else {
                    $model_vtproducto = Vtproducto::find()->where(['prsubgrupo'=> $searchModel->prsubgrupo])->all();
                    if (empty($model_vtproducto) && !empty($searchModel->prsubgrupo)) {$vacio = 0;}
                    else {
                        $vacio = 2; 
                    }
                }
            }
            if (empty($searchModel->prcodigo) && empty($searchModel->prgrupo) && empty($searchModel->prsubgrupo)) { $vacio = 0;}
            if (empty($searchModel->prgrupo)) { $vacio = 0;}
        ?>
    <?php

        if (($vacio == 2 && $vacio !== 0)) { ?>
         <?= Html::a('Imprime Catalogo de la Selección',    ['imprimeseleccion', 
                                                                'prcodigo' => $searchModel->prcodigo,
                                                                'prgrupo' => $searchModel->prgrupo,
                                                                'prsubgrupo' => $searchModel->prsubgrupo
                                                            ], ['class' => 'btn btn-success']); ?>
         <?php } ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager'     => [
            'firstPageLabel' => 'Primera',
            'lastPageLabel'  => 'Ultima',
            'maxButtonCount' =>  '18',
            'class' => \yii\bootstrap4\LinkPager::class],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'prgrupo',
            'prsubgrupo',
            'prcodigo',
            'prnombre',           
            'prunimed',
            [
                'attribute' => 'Fotos',
                'contentOptions' => ['style' => 'text-align:center;width:200px;'],
                'format' => 'raw',
                'value' => function ($model) 
                {
                    $model_vtfoto = Vtfoto::findOne(array('ftcodigo'=> $model->prcodigo));
                        if ($model_vtfoto !== null){
                            if ($model_vtfoto->ftfoto !== '') {
                            $url = 'http://werneryraddatz.ddns.net/gescomfotos/productos/'.$model_vtfoto->ftfoto;
                            return Html::a('<img src="http://werneryraddatz.ddns.net/gescomfotos/productos/'.$model_vtfoto->ftfoto.'"  width="100px" height="auto">', $url, ['title' => '"Clic" ver Foto']);
                        } else { return Html::a('<img src="http://werneryraddatz.ddns.net/gescomfotos/productos/sinfoto.jpg'.'"  width="100px" height="auto">'); }} else { return  Html::a('<img src="http://werneryraddatz.ddns.net/gescomfotos/productos/sinfoto.jpg'.'"  width="100px" height="auto">'); }
                },
            ],

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{print_ing}',
    'buttons' => [
        'print_ing' => function($url, $model) {
            return Html::a(
                '<span class="fa fa-newspaper-o" aria-hidden="false"></span>',$url,
                    [
                        'title' => 'Imprimir Catalogo',
                    ]
            );
        },
    ],
    'urlCreator' => function ($action, $model, $id)
    {
        if ( $action == 'print_ing' ) {
            return yii\helpers\Url::to(['vtproducto/imprime', 'id' => $id]);
        }
    }
], 
        ],
    ]); ?>
</div>