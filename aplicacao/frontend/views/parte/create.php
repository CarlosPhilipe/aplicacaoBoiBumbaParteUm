<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = 'Cadastrar Parte da apresentação: '.$apresentacao->nome;
$this->params['breadcrumbs'][] = ['label' => 'Parte', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
        'apresentacao' => $apresentacao,
    ]) ?>

</div>
