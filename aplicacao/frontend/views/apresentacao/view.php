<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Elemento;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = $model->idapresentacao;
$this->params['breadcrumbs'][] = ['label' => 'Apresentacao', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-view">

    <h1><?= 'Apresentacao: '.$model->nome; ?></h1>

    <p>
        <?= Html::a('Adinionar parte', ['addparte', 'id' => $model->idapresentacao], ['class' => 'btn btn-primary']) ?>
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
            'data_hora_fim'
        ],
    ]) ?>
    <div id="row">
          <table class="table table-striped">
            <tr><th>Nome</th><th>Tempos</th><th></tr>
             <?php foreach ($listPartes as $parte):?>
                <tr>
                    <td><?= $parte['nome'] ?></td>
                    <td><?= (new Elemento())->tempoFormatado($parte['tempo'])['tempoFormatado'] ?></td>
                </tr>
            <?php endforeach?>
          </table>  

    </div>




</div>
