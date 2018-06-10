<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comuni */

$this->title = 'Aggiorna Comune: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Comuni', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comuni-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
