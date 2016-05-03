<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\PersonalActionColumn;
use frontend\models\ApresentacaoSearch;
use frontend\models\ElementoSearch;
use frontend\models\Elemento;


$this->title = 'Cronômetro da Apresentação '.$nome;
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/cronometro.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/cronometro.css');
?>

<div class="classes-index">

    <h1><?= Html::encode($this->title) ?></h1>
	<div class="container text-left col-xs-offset-1">
	    <h3>
		    <?php
		    	if($status==0){
		    		echo 'Status: Não iniciada';
		    	}elseif ($status==1) {
		    		echo 'Status: Iniciada<br>Data: '.$datetimedb;
		    	}
		    ?>
	    </h3>
	</div>

	<br>

    <div class="container text-center">        
        <button id="tempo" class="btn-cronometrista btn-primary hide">Total: 00:00:00</button>
        <button id="parcial" class="btn-cronometrista btn-sucess hide">Parcial: 00:00:00</button>         
    </div>

    <br>

    <div class="container text-center">        
        <button id="btn" onclick="cronometroGeral(<?=$status?>)" type="button" class="btn btn-lg btn-success">Mostrar Cronômetros</button>
        <?= Html::a('Executar Apresentação', ['executar_apresentacao', 'id' => $id], ['class' => 'btn btn-lg btn-warning']) ?>
        <?= Html::a('Parar Apresentação', ['parar_apresentacao', 'id' => $id], ['class' => 'btn btn-lg btn-warning']) ?>
    </div>

    <br>

    <div class="input-group">
        <input id="horas" type="hidden" value="<?php echo $horas ?>" class="form-control" placeholder="Horas">
        <input id="minutos" type="hidden" value="<?php echo $minutos ?>" class="form-control" placeholder="Minutos">
        <input id="segundos" type="hidden"  value="<?php echo $segundos ?>" class="form-control" placeholder="Segundos">

        <input id="horasParcial" type="hidden" value="<?php echo $horas ?>" class="form-control" placeholder="Horas">
        <input id="minutosParcial" type="hidden" value="<?php echo $minutos ?>" class="form-control" placeholder="Minutos">
        <input id="segundosParcial" type="hidden"  value="<?php echo $segundos ?>" class="form-control" placeholder="Segundos">
    </div>

    <table class="table table-bordered table-striped table-responsive">
          <?php foreach ($partes as $parte):?>
              <thead>
                  <tr>
                      <th><?=$parte['nome'] ?></th>
                      <th class='text-center'>Tempo</th>
                      <th class='text-center'>Ação</th>
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
                          <td>
                              <?= Html::a('Contabilizar', ['cronometro', 'id' => $id], ['class' => 'btn btn-primary']) ?>
                              <?= Html::a('cancelar', ['cronometro', 'id' => $id], ['class' => 'btn btn-warning']) ?>
                          </td>
                      </tr>
                  </tbody>
              <?php endforeach?>
          <?php endforeach?>                        
    </table>

    <br><br>
    <h3>Histórico Realizado</h3>
    <table class="table table-bordered table-striped table-responsive">
    	<thead>
            <tr>
                <th>Elemento</th>
                <th class='text-center'>Tempo consumido</th>
            </tr>
        </thead>

        <tbody>
            <tr class='text-center'>
                <td>Cantoria</td>
                <td>13:10</td>
            </tr>
            <tr class='text-center'>
                <td>canto novo</td>
                <td>3:35</td>
            </tr>
            <tr class='text-center'>
                <td align="right"><strong>TOTAL</strong></td>
                <td><strong>16:45</strong></td>
            </tr>
        </tbody>
    </table>

</div>
