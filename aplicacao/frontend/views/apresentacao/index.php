<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\PersonalActionColumn;
use frontend\models\ApresentacaoSearch;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApresentacaoSeach*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apresentacao';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php   echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cadastrar apresentacao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome',
            'tempo',
            'data_hora_inicio',
            'data_hora_fim',
            ['class' => 'yii\grid\PersonalActionColumn'],
        ],
    ]); ?>


</div>
