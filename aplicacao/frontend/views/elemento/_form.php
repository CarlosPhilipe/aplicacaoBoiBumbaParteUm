<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div id="row">
    	<div class="col-md-6"> <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?></div>
    	<div class="col-md-6"><?= $form->field($model, 'tipo_idtipo')->textInput() ?></div>

    </div>
	<div id="row">
    	<div class="col-md-6"><?= $form->field($model, 'tempo')->textInput() ?></div>
    	<div class="col-md-6"><?= $form->field($model, 'descricao')->textArea(['maxlength' => true,  'rows' => 6, 'cols' => 30]) ?></div>

    </div>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
