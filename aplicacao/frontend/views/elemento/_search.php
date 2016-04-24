<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\ElementoSearch;

/* @var $this yii\web\View */
/* @var $model frontend\models\ClassesSearcg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php ActiveForm::end(); ?>

</div>
