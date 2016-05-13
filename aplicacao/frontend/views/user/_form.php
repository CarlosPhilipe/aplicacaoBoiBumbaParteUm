<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        if($model->isNewRecord ){
            echo $form->field($model, 'username')->textInput(['maxlength' => true]) ;
        }else{
            echo '<h2>Nome de usuário: '.$model->username.'</h2>';
        }
    ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senha')->passwordInput() ?>

    <?= $form->field($model, 'confirmaSenha')->passwordInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php if(Yii::$app->user->identity->grupoacesso == "admin" ) { ?>
                <?= $form->field($model, 'grupoacesso')->textInput(['maxlength' => true])
             ->dropDownList(
            [
                'bloqueado'=>'Bloqueado',
                'cronometrista'=>'Cronometrista',
                'presidente'=>'Presidente',
                'admin'=>'Administrador',], ['prompt'=>'Selecione']
            )->label('Grupo de Acesso') ?>
            <?php }  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
