<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Anagrafica */

$this->title = 'Inserisci nuova Anagrafica';
$this->params['breadcrumbs'][] = ['label' => 'Anagrafica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anagrafica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
