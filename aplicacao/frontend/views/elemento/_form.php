<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use frontend\models\ItemSearch;


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
    	<div class="col-md-3"><?= $form->field($model, 'tipo_idtipo')->dropDownList(ArrayHelper::map($tipo, 'idtipo', 'nome'), ['prompt'=>'Selecione']) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'item_iditem')->dropDownList(ArrayHelper::map(ItemSearch::getIdAndName(), 'iditem', 'nome'), ['prompt'=>'Selecione']) ?></div>
    </div>
	<div id="row">
        <div class="col-md-6"><?= $form->field($model, 'tempoString')->widget(MaskedInput::className(), ['mask' => '99:99'])?></div>
        <div class="col-md-6"><?= $form->field($model, 'descricao')->textArea(['maxlength' => true,  'rows' => 6, 'cols' => 30]) ?></div>
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
