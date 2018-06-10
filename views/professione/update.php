<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Professione */

$this->title = 'Aggiorno professione: ' . $model->descrizione;
$this->params['breadcrumbs'][] = ['label' => 'Professioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->descrizione, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="professione-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
