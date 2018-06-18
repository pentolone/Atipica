<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Responsabilitabersaglio */

$this->title = 'Update Responsabilitabersaglio: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Responsabilitabersaglios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="responsabilitabersaglio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
