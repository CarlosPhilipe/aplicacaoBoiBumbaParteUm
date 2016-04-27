<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Elemento;
use frontend\models\ElementoSearch;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ElementoSeach*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apresentação: '.$apresentacao->nome;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div id="row">
        <table class="table table-striped">
            <tr><th>Nome</th><th>Tempo</th><th>Ações</th></tr>
            <?php foreach ($listElementos as $elemento):?>
                <tr>
                    <td><?= $elemento['nome']?></td>
                    <td><?= (new Elemento)->tempoFormatado($elemento['tempo'])['tempoFormatado']; ?></td>
                    <td><?= Html::a('Executar', ['ocorrida', 'id' => $elemento['idelemento']], ['class' => 'btn btn-success']) ?></td>
                </tr>
            <?php endforeach ?>
        </table>

    </div>

</div>
