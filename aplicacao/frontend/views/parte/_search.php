<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\ParteSearch;

/* @var $this yii\web\View */
/* @var $model frontend\models\ClassesSearcg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
