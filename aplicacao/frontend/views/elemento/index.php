<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\ElementoSearch;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ElementoSeach*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Elemento da parte: '.$parte->nome;
$this->params['breadcrumbs'][] = ['label' => 'Partes', 'url' => ['parte/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php   echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= DetailView::widget([
        'model' => $parte,
        'attributes' => [
            'nome',   // description attribute in HTML
            [                      // the owner name of the model
                'label' => 'Apresentação',
                'value' => $apresentacao->nome,
            ],  
        ],
    ]) ?>

    <p>
        <?= Html::a('Cadastrar elemento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome',
            'tempoFormatado',
            'descricao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
