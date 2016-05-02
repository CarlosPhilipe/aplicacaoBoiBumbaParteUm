<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Elemento;
use frontend\models\ElementoSearch;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = 'Apresentacao: '.$model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Apresentacao', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-view">

    <h1><?= 'Apresentacao: '.$model->nome; ?></h1>

    <p>
        
        <?= Html::a('Atualizar', ['update', 'id' => $model->idapresentacao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->idapresentacao], [
            'class' => 'btn btn-default',
            'data' => [
                'confirm' => 'Tem certeza de que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'data_hora_inicio',
            'data_hora_fim',
            [                      // the owner name of the model
                'label' => 'Obs:',
                'value' => 'Somente visíveis partes com tempo maior que zero',
            ]
        ],
    ]) ?>
  
  <br>
  <h3>Roteiro</h3>

  <p><?= Html::a('Executar', ['cronometro', 'id' => $model->idapresentacao], ['class' => 'btn btn-primary']) ?></p>
	
	<table class="table table-bordered table-striped table-responsive">
          <?php foreach ($partes as $parte):?>
              <thead>
                  <tr>
                      <th><?='Elementos da '.$parte['nome'] ?></th>
                      <th class='text-center'>Tempo</th>
                  </tr>
              </thead>

              <!-- Geração do parametro dos elementos -->
              <?php
                  $elemento = new ElementoSearch();
                  $elementos = $elemento->getAllElementosParte($parte['idparte']);

              ?>
              <?php foreach ($elementos as $elemento):?>
                  <tbody>
                      <tr class='text-center'>
                          <td><?=$elemento['nome']?></td>
                          <td><?php echo intval(intval($elemento['tempo'])/60).':';
                          			if(intval(intval($elemento['tempo'])%60)<10){
                          				echo 0;
                          			}
                          			echo intval(intval($elemento['tempo'])%60) ?></td>
                      </tr>
                  </tbody>
              <?php endforeach?>
          <?php endforeach?>                        
    </table>
</div>
