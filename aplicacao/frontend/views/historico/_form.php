<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Historico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apresentacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'elemento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempo_consumido')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
