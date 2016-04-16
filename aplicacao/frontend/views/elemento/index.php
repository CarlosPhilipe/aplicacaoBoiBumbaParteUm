<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\ElementoSearch;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ElementoSeach*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Elemento';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php   echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cadastrar elemento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome',
            'tempoMinuto',
            'tempoSegundo',
            'descricao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
