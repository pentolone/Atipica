<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Risorseumane */

$this->title = 'Inserisci nuova Risorsa Umana';
$this->params['breadcrumbs'][] = ['label' => 'Risorse Umane', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="risorseumane-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
