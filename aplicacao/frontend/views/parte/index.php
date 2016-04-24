<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\ParteSearch;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ParteSeach*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Partes da apresentção: '.$apresentacao->nome;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-index">

    <h1><?= Html::encode($this->title) ?></h1>
   <!-- <?php   echo $this->render('_search', ['model' => $searchModel]); ?> -->

    <p>
        <?= Html::a('Cadastrar Parte', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
