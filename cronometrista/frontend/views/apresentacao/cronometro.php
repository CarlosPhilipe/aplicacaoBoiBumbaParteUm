<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\PersonalActionColumn;
use frontend\models\ApresentacaoSearch;
use frontend\models\ElementoSearch;
use frontend\models\Elemento;
use frontend\models\HistoricoSearch;


$this->title = 'Cronômetro da Apresentação '.$nome;
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/cronometro.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/cronometro.css');
?>

<div class="classes-index">

    <h1><?= Html::encode($this->title) ?></h1>

     <div class="container text-left">        
        <button id="iniciar" onclick="iniciar(<?=$id?>)" type="button" class="btn btn-lg btn-success">Iniciar</button>
        <button id="parar" onclick="parar(<?=$id?>)" type="button" class="btn hide btn-lg btn-primary">Parar</button>
        <button id="sair" onclick="sair(<?=$id?>)" type="button" class="btn hide btn-lg btn-success">sair</button>
    </div>

    <div class="row vdivide">
        <div class="col-sm-12 text-center">
            <h2>Cronômetro</h2>
            <button id="tempo" class="btn-cronometrista btn-primary">00:00:00</button>
        </div>
        <!-- <div class="col-sm-4 text-center">
            <button id="parcial" class="btn-cronometrista btn-sucess">00:00:00</button>
        </div> -->
    </div>

    <div id="previsao" class='text-center'>
        <div class="row vdivide">
            <div class="col-sm-3 text-center">
                  <h2>Regresivo</h2>
                  <button class="btn-cronometrista2 btn-primary">00:00:00</button>
            </div>

            <div class="col-sm-3 text-center">
                  <h2>Tempo Restante</h2>
                  <button class="btn-cronometrista2 btn-primary">00:00:00</button>
            </div>

            <div class="col-sm-3 text-center">
                  <h2>Consumido</h2>
                  <button class="btn-cronometrista2 btn-primary">00:00:00</button>
            </div>
            
            <div class="col-sm-3 text-center">
                  <h2>Previsão</h2>
                  <button class="btn-cronometrista2 btn-primary">00:00:00</button>
            </div>
    </div>

    </div>

    <div class="input-group">
        <input id="horas" type="hidden" value="<?php echo $horas ?>" class="form-control" placeholder="Horas">
        <input id="minutos" type="hidden" value="<?php echo $minutos ?>" class="form-control" placeholder="Minutos">
        <input id="segundos" type="hidden"  value="<?php echo $segundos ?>" class="form-control" placeholder="Segundos">

        <input id="horasParcial" type="hidden" value="<?php echo $horas ?>" class="form-control" placeholder="Horas">
        <input id="minutosParcial" type="hidden" value="<?php echo $minutos ?>" class="form-control" placeholder="Minutos">
        <input id="segundosParcial" type="hidden"  value="<?php echo $segundos ?>" class="form-control" placeholder="Segundos">
    </div>

    <br><br>
    <h3>Roteiro</h3>
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
                              <button id=<?='"contabilizar'.$elemento['idelemento'].'"' ?> onclick="contabilizar(<?php echo $id.','.$parte['idparte'].','.$elemento['idelemento']?>)" type="button" class="btn btn-primary">Contabilizar</button>
                          </td>
                      </tr>
                  </tbody>
              <?php endforeach?>
          <?php endforeach?>                        
    </table>

    <br><br>
    <h3>Realizado</h3>

    <table class="table table-bordered table-striped table-responsive">
    	<thead>
            <tr>
                <th>Elemento</th>
                <th>Tempo consumido</th>
                <th>Diferença</th>
            </tr>
        </thead>

        <tbody id="tabelahistorico" class='text-center'>                
                
        </tbody>


    </table>

</div>
