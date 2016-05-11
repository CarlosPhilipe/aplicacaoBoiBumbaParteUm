<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Elemento;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Parte', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-view">

    <h1><?= 'Parte: '.$model->nome; ?></h1>

    <p>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Gerenciar Elementos', ['addelemento', 'id' => $model->idparte], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idparte], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->idparte], [
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
            'nome',   // description attribute in HTML
            [                      // the owner name of the model
                'label' => 'Apresentação',
                'value' => $apresentacao->nome,
            ],  
            'tempo',
        ],
    ]) ?>

     <div id="row">
              <table class="table table-striped">
                <tr><th>Nome da Parte</th><th>Tempo</th><th></tr>
                 <?php foreach ($listElementos as $elemento):?>
                    <tr>
                        <td><?= $elemento['nome'] ?></td>
                        <td><?= (new Elemento())->tempoFormatado($elemento['tempo'])['tempoFormatado'] ?></td>
                    </tr>
                <?php endforeach?>
              </table>  

        </div>
    </div>
