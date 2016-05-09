<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use kartik\widgets\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */
/* @var $form yii\widgets\ActiveForm */

// inclui arquivo js
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/elemento.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>
<div class="classes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div id="row">
    	<div class="col-md-6"><?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'aberta')->dropDownList([false =>'Fechada',true =>'Aberta'], ['prompt'=>'Selecione']) ?> 
    </div>	
    </div>

	<div id="row">
        <div class="col-md-6"><?=$form->field($model, 'data_hora_inicio')->widget(DateTimePicker::classname(), ['options' => ['placeholder' => 'Enter event time ...'], 'pluginOptions' => ['autoclose' => true, 'format' => 'yyyy-mm-dd hh:ii:ss',]]);?></div>

        <div class="col-md-6"><?=$form->field($model, 'data_hora_fim')->widget(DateTimePicker::classname(), ['options' => ['placeholder' => 'Enter event time ...'], 'pluginOptions' => ['autoclose' => true, 'format' => 'yyyy-mm-dd hh:ii:ss',]]);?></div>
    </div>
    <div id="row">
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
     
    <?php ActiveForm::end(); ?>

</div>
