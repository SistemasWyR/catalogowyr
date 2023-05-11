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
    $limite100 = 0;
    foreach($model_vtproducto as $key) { ++$limite100;}
    if ($limite100>100){
        echo "<font size='12' face='Calibri'>"."Selección mayor a 100 Productos"."</font>"; ?>
        <br>
         <?= Html::a(
            'Volver',
            ['vtproducto/index'], ['class' => 'btn btn-info',
         ]); ?>
       
    <?php } else
    { ?> <?php
    $pdf = new mPDF(['format' => [260,298],
                            'margin_top' => 3,
                            'mirrorMargins' => true]); ?>

    <?php $cant_x_pag = 0; foreach($model_vtproducto as $key){ ?>
    <?php  /* 
        $header = "<table style='vertical-align:top'>
                <tr>
                    <td>".Html::img('@web/imagen/SuperiorLogo.png',['height'=>'250', 'width'=>'1640'])."
                    </td>
                </tr>
            </table><br>";
            if ($cant_x_pag == 0) {$pdf->WriteHTML($header);} */
            if ($cant_x_pag == 0) {$pdf->WriteHTML(Html::img('@web/imagen/SuperiorLogo.png',['height'=>'250', 'width'=>'1640'])); $pdf->WriteHTML("&nbsp;");}
            
        $detail = DetailView::widget([
            'model' => $key,
            'attributes' => [
                [
                    'attribute' => '',
                    'format' => 'raw',
                    'options'=>['class'=>'text-left'],
                    'value' => function ($model_vtproducto) {
                        $model_vtfoto = Vtfoto::findOne(array('ftcodigo'=> $model_vtproducto->prcodigo));
                        if ($model_vtfoto !== null){
                            if ($model_vtfoto->ftfoto !== '') {
                            $url = 'http://werneryraddatz.ddns.net/gescomfotos/productos/'.$model_vtfoto->ftfoto;
                            return Html::a('<img src="http://werneryraddatz.ddns.net/gescomfotos/productos/'.$model_vtfoto->ftfoto.'"  width="auto" height="180px">', $url, ['title' => '"Clic" ver Foto']);
                        } else { return Html::a('<img src="http://werneryraddatz.ddns.net/gescomfotos/productos/sinfoto.jpg'.'"  width="100px" height="auto">'); }} else { return  Html::a('<img src="http://werneryraddatz.ddns.net/gescomfotos/productos/sinfoto.jpg'.'"  width="auto" height="180px">'); }
                },
                ],
            ],
                ]);
                $pdf->WriteHTML("<table align='center' style='width:100%; border:1px solid #000000'>");
                    $pdf->WriteHTML("<tr>");
                        $pdf->WriteHTML("<td rowspan='3' style='text-align:left;'>");
                            $pdf->WriteHTML($detail);
                        $pdf->WriteHTML("</td>");
                        $pdf->WriteHTML("<td style='text-align:left; color:red; font-size:5px;'>"); //en td->font-style:italic; font-family:Garamond; <td style="vertical-align:top">
                        $pdf->WriteHTML("<font size='7' face='Calibri'>".$key->prcodigo."</font>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='#252527'; face='Calibri'>"."Unidad metrica : ".$key->prunimed."</font>");
                        $pdf->WriteHTML("</td>");
                    $pdf->WriteHTML("</tr>");
                    $pdf->WriteHTML("<tr>");
                        $pdf->WriteHTML("<td>"); 
                            $pdf->WriteHTML("<font size='5' face='Calibri'>".$key->prnombre."</font>");
                        $pdf->WriteHTML("</td>");
                    $pdf->WriteHTML("</tr>");
                    $pdf->WriteHTML("<tr>");
                        $pdf->WriteHTML("<td style='font-family: serif; font-size: 3pt;'>");
                            if ($key->prcomentario !== null) {
                                $pdf->WriteHTML("<font size='1' face='Calibri'>".$key->prcomentario."</font>");
                            }
                        $pdf->WriteHTML("</td>");
                    $pdf->WriteHTML("</tr>");
                $pdf->WriteHTML("</table>");
            //    $pdf->WriteHTML("&nbsp;");        
         ++$cant_x_pag;
         if ($cant_x_pag == 4) {
            $pdf->WriteHTML("<p style='text-align:center; font-family: serif; font-size: 6pt;'>
            Casa matriz: Baquedano 805 - Llanquihue. Fonos:(65) 2 242618-(65) 2 242200. wyr@wyr.cl &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            Sucursal: Arturo Alessandri 189 - Edificio Cafra - Frutillar. Fonos:(65) 2 421005-(65) 2 421009. frutillar@wyr.cl</p>"
         );
            $pdf->AddPage(); $cant_x_pag = 0;} else {$pdf->WriteHTML("&nbsp;");}
         ?>
    <?php } 
        $pdf->WriteHTML("<p style='text-align:center; font-family: serif; font-size: 6pt;'>
        Casa matriz: Baquedano 805 - Llanquihue. Fonos:(65) 2 242618-(65) 2 242200. wyr@wyr.cl &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        Sucursal: Arturo Alessandri 189 - Edificio Cafra - Frutillar. Fonos:(65) 2 421005-(65) 2 421009. frutillar@wyr.cl</p>"
     );?>
     <?php $pdf->Output(); exit; }?>
</div>