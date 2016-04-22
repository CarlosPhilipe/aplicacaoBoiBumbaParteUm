<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\CActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use frontend\models\Elemento;



/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = 'Ordenação';
$this->params['breadcrumbs'][] = ['label' => 'Parte', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="classes-create">

    <h1>Ordenação <?= $model->nome;?></h1>

    <div class="classes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div id="row">
        <div class="col-md-12">
            <table   class="table table-striped">
                <tr><td>Ordem</td><td>Mover</td><td>nome</td><td>Descrição</td></tr>
            <?php foreach ($elementos as $key => $elemento): ?>
                <tr>
                    <td><?= $elemento['posicao'] ?></td>
                    <td><input class="btn btn-default" type="button" value="Cima"></td>
                    <td><?= $elemento['nome'] ?></td>
                    <td><?= $elemento['descricao'] ?></td>
                    </tr>  
            <?php endforeach ?>
            </table>
        </div>
    
    </div>


    <div id="row">
        <div class="col-md-12">
        
        
        </div>
    
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <?= Html::submitButton('Concluir', ['class' => 'btn btn-primary', 'name'=>'save']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
