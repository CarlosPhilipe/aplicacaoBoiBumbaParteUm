<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\CActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use frontend\models\Elemento;



/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */
/* @var $form yii\widgets\ActiveForm */

// inclui arquivo js
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/elemento.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>
<div class="classes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div id="row">
        <div class="col-md-12"><?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?></div>
    
    </div>


    <div id="row">
        <div class="col-md-12">
         <pre>
         <?= Html::checkboxList('Parte[listElementos]',$elementosCkd,$elementos); ?>
        </pre>
        
        </div>
    
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
