<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = 'Cadastrar Elemento';
$this->params['breadcrumbs'][] = ['label' => 'Elemento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
