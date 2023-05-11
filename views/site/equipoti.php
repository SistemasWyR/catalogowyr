<?php

use yii\helpers\Html;

$this->title = 'Equipo TI, somos Chicos buenos...';
?>
  <h2><?= Html::encode($this->title) ?></h2>

<div class="ordendeatencion-view">
    <p>
    <?= Html::a('Volver', ['index'], ['class' => 'btn btn-info']) ?>      
    </p>
    <div class="row">
        <div class="col-lg-4">
          <div align="center">
            <?php echo Html::img('@web/imagen/it_team.jpeg',['height'=>'480', 'width'=>'1040']) ?>
          </div>
        </div>  
    </div>  
</div>
