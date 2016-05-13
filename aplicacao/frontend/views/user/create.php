<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = 'Criar usuário';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
	<p>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
