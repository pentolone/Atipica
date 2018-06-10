<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Indicatori */

$this->title = 'Aggiorna indicatore: ' . $model->titolo;
$this->params['breadcrumbs'][] = ['label' => 'Indicatoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->titolo, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="indicatori-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
