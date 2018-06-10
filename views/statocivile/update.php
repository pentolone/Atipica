<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Statocivile */

$this->title = 'Aggiorna Stato Civile: ' . $model->descrizione;
$this->params['breadcrumbs'][] = ['label' => 'Stato Civile', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->descrizione, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="statocivile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
