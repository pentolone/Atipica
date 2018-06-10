<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Statoattivita */

$this->title = 'Aggiorna Stato attività: ' . $model->descrizione;
$this->params['breadcrumbs'][] = ['label' => 'Stato attività', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->descrizione, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="statoattivita-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
