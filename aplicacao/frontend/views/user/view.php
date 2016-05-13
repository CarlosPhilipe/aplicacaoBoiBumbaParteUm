<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

        <p>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-default',
            'data' => [
                'confirm' => 'Tem certeza de que deseja excluir este usuário?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'nome',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'role',
            'status',
            'created_at',
            'updated_at',
            'email:email',
            'grupoacesso',
        ],
    ]) ?>

</div>
