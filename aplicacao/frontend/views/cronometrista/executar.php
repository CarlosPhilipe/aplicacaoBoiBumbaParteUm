<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Elemento;
use frontend\models\ElementoSearch;
use yii\widgets\DetailView;
use yii\grid\PersonalActionColumn;
use frontend\models\ApresentacaoSearch;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ElementoSeach*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cronômetro da Apresentação';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/cronometro.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/cronometro.css');

$this->title = 'Apresentação: '.$apresentacao->nome;
$this->params['breadcrumbs'][] = $this->title;
$horas = 1;
$minutos=32;
$segundos = 25;
?>

<div class="classes-index">
    <div class="container">
      
        <div class="col-md-12 text-center center-block">
            <div id="tempo" type="button" class="btn btn-lg btn-warning text"> 00:00:00</div>
        </div>
      
        <div class="marginTop col-md-12 text-center center-block">
            <button id="btn" onclick="cronometro(1)" type="button" class="col-md-2 col-md-offset-5 btn btn-success">Iniciar</button>
        </div>
       
        <div class="marginTop col-md-12 text-center center-block">
            <button id="btnStop" onclick="stop()" type="button" class="hide col-md-2 col-md-offset-5 btn btn-primary">Stop</button>
        </div>

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <div id="row">
        <table class="table table-striped">
            <tr><th>Nome do Elemento</th><th>Tempo</th><th>Ações</th></tr>
            <?php foreach ($listElementos as $elemento):?>
                <tr>
                    <td><?= $elemento['nome']?></td>
                    <td><?= (new Elemento)->tempoFormatado($elemento['tempo'])['tempoFormatado']; ?></td>
                    <td><?= Html::a('Executar', ['ocorrida', 'id' => $elemento['idelemento']], ['class' => 'btn btn-success']),Html::a('Retirar', ['retirada', 'id' => $elemento['idelemento']], ['class' => 'btn btn-warning']) ?></td>
                </tr>
            <?php endforeach ?>
            <td>Tempo Total: </td>
        </table>

    </div>

    <div class="input-group">
        <input id="horas" type="hidden" value="<?php echo $horas; ?>" class="form-control" placeholder="Horas">
        <input id="minutos" type="hidden" value="<?php echo $minutos; ?>" class="form-control" placeholder="Minutos">
        <input id="segundos" type="hidden"  value="<?php echo $segundos; ?>" class="form-control" placeholder="Segundos">
    </div>

</div>

