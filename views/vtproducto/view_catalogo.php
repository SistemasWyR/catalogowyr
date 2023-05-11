<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Vtproducto;
use app\models\Vtfoto;

$this->title = 'CATALOGO';
?>
<table align="center" style="width:100%">
    <tr>
        <td>
            <?php
                echo Html::img('@web/imagen/SuperiorLogo.png',['height'=>'250', 'width'=>'1640']);
                $model_vtproducto = Vtproducto::findOne($prindice);
            ?>  
        </td>
    </tr>
</table>
<br>
<br>
<table align="center" style="width:100%">
    <tr>
        <td rowspan='3'>
            <?= DetailView::widget([
                'model' => $model_vtproducto,
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
                                return Html::a('<img src="http://werneryraddatz.ddns.net/gescomfotos/productos/'.$model_vtfoto->ftfoto.'"  width="200px" height="auto">', $url, ['title' => '"Clic" ver Foto']);
                            } else { return Html::a('<img src="http://werneryraddatz.ddns.net/gescomfotos/productos/sinfoto.jpg'.'"  width="100px" height="auto">'); }} else { return  Html::a('<img src="http://werneryraddatz.ddns.net/gescomfotos/productos/sinfoto.jpg'.'"  width="200px" height="auto">'); }
                    },
                    ],

            ],
            ]) ?>
       </td>
        <td style="text-align:left; vertical-align:top">
            <?php echo "<font size='7' color='red' face='Calibri'>".$model_vtproducto->prcodigo."</font>"; ?>
            <?php echo "<font color='#252527'; face='Calibri'>"."</font>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font face='Calibri'>"."Unidad metrica : ".$model_vtproducto->prunimed."</font>"; ?>
            <br>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo "<font size='5' face='Calibri'>".$model_vtproducto->prnombre."</font>"; ?>
            <br>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo "<font size='1' face='Calibri'>".$model_vtproducto->prcomentario."</font>"; ?>
        </td>
    </tr>
</table>
<footer>
  <p style='text-align:center; font-family: serif; font-size: 6pt;'>
  Casa matriz: Baquedano 805 - Llanquihue. Fonos:(65) 2 242618-(65) 2 242200. wyr@wyr.cl &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  Sucursal: Arturo Alessandri 189 - Edificio Cafra - Frutillar. Fonos:(65) 2 421005-(65) 2 421009. frutillar@wyr.cl</p>
</footer>
<style type="text/css"> 
   .interlineado { line-height: 2%;} 
   </style>
