<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\PersonalActionColumn;
use frontend\models\ApresentacaoSearch;



$this->title = 'Cronômetro da Apresentação';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/cronometro.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/cronometro.css');
?>
<div class="classes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="container">
      
      <div class="col-md-12 text-center center-block">
        <div id="tempo" type="button" class="btn btn-lg btn-warning text"> 00:00:00</div>
      </div>
      
      <div class="marginTop col-md-12 text-center center-block">
         <button id="btn" onclick="cronometro()" type="button" class="col-md-2 col-md-offset-5 btn btn-success">Iniciar</button>
       </div>
       
       <div class="marginTop col-md-12 text-center center-block">
        <button id="btnStop" onclick="stop()" type="button" class="hide col-md-2 col-md-offset-5 btn btn-primary">Stop</button>
       </div>      
    </div>


</div>
