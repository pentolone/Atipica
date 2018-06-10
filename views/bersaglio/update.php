<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bersaglio */

$result = $model->getAnagrafica()->one();
$nome = $result['nome'] . ' ' . $result['cognome'];

$this->title = 'Aggiorna bersaglio per ' . $nome;
$this->params['breadcrumbs'][] = ['label' => 'Bersaglio', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->titolo, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bersaglio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
