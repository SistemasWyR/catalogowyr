<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use Mpdf\Mpdf;      //PHP 7.0 se instala así "$composer require mpdf/mpdf"

use app\models\Vtproducto;
use app\models\Vtfoto;

$this->title = 'CATALOGO';
?>
<div class="productos-view">
<?php
    if (!empty($prgrupo) && empty($prsubgrupo) && empty($prcodigo)) {
        $model_vtproducto = Vtproducto::find()->where(['prgrupo'=> $prgrupo])
                                            ->all();
    } else { if (empty($prgrupo) && !empty($prsubgrupo) && empty($prcodigo)) {
        $model_vtproducto = Vtproducto::find()->where(['prsubgrupo'=> $prsubgrupo])
                                            ->all();
    } else { if (!empty($prgrupo) && !empty($prsubgrupo) && empty($prcodigo)) {
        $model_vtproducto = Vtproducto::find()->where(['prgrupo'=> $prgrupo,
                                                        'prsubgrupo'=> $prsubgrupo])
                                            ->all();
    }}}
    // $pdf = new mPDF(); ?>
<!-- <style>
table {
    width: 100%;
    border: thin solid black;
    border-collapse: collapse;
}
td {
    border: thin solid black;
}
th, tfoot td {
    border: thin solid black;
    text-align: center;
    font-weight: bold;
}
tbody td {
    font-size: 80%;
    text-align: center;
}
caption {
    font-size: 90%;
    text-align: right;
}
td, th, caption {
    padding: 10px;
}
</style> -->
    <?php $cant_x_pag = 0; foreach($model_vtproducto as $key){ ?>
    <?php    
        $header = "<table>
                <tr>
                    <td>".Html::img('@web/imagen/LogoReportes.jpg',['height'=>'110', 'width'=>'300'])."
                    </td>
                    <td>
                    <h1>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".Html::encode($this->title) ."</h1>
                    </td>
                </tr>
            </table><br>"; 
            if ($cant_x_pag == 0) {echo $header;} 
            ?>
    <table align="center" style="width:100%">
    <tr>
        <td>
            <?= DetailView::widget([
                    'model' => $key,
                    'attributes' => [
                        [
                            'attribute' => '',
                            'format' => 'raw',
                            'options'=>['class'=>'text-left'],
                            'value' => function ($key) {
                                $model_vtfoto = Vtfoto::findOne(array('ftcodigo'=> $key->prcodigo));
                                if ($model_vtfoto !== null)
                                    {
                                $url = 'http://werneryraddatz.ddns.net/gescomfotos/productos/'.$model_vtfoto->ftfoto;
                                    return Html::a(
                                    '
                                    <img src="http://werneryraddatz.ddns.net/gescomfotos/productos/'.$model_vtfoto->ftfoto.'" width="auto" height="180px">
                                    '
                                    , $url, ['title' => '"Clic" ver Foto']);
                                    } else 
                                    { return 'sin image'; }
                                        },
                                    ],
                            ],
                        ]); ?>
    </td>
        <td style="vertical-align:top">
            <?= DetailView::widget([
                    'model' => $key,
                    'attributes' => [
                        'prcodigo',
                //        'prnombre',
                        'prunimed',
                        'prcomentario',

                ],
                ]); ?>
                </td>
    </tr>
</table>
      <!--   bgcolor="#D7D7D9"
         $pdf->WriteHTML('
           <table  align="center" style="width:100%">
            <tr>
                <td rowspan="3"> 
                '.$detail.'
                </td>
                <td style="vertical-align:top">
                    '."Código : ".$key->prcodigo."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."UniMed : ".$key->prunimed.' 
                </td>
            <tr>
                <td>
                    '."Nombre : ".$key->prnombre.'
                </td>
            </tr>
            <tr>
                <td>
                    '."Descripción : ".$key->prcomentario.'
                </td>
            </tr>
            </tr>
            </table>
            &nbsp;
       ');
            ++$cant_x_pag;
            if ($cant_x_pag == 4) {$pdf->AddPage(); $cant_x_pag = 0;}
            ?> -->
    <?php   ++$cant_x_pag;
            if ($cant_x_pag == 6) 
                 {  echo '<span class="pageBreak"></span>' . PHP_EOL; $cant_x_pag = 0;} ?>
            <?php } ?>
    <?php /* $pdf->Output(); exit; */ ?>
</div>

<!-- <table align="center" style="width:100%"> 
    <td style="vertical-align:top">' -->