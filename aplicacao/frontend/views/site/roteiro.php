<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Roteiro */
/* @var $form ActiveForm */
?>
<div class="site-roteiro">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'apresentacao_idapresentacao') ?>
        <?= $form->field($model, 'nome') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-roteiro -->
