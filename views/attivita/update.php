<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Attivita */

$this->title = 'Aggiorna Attività: ' . $model->descrizione;
$this->params['breadcrumbs'][] = ['label' => 'Attività', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->descrizione, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attivita-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
