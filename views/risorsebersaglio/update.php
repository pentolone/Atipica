<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Risorseumanebersaglio */

$this->title = 'Aggiorna Responsabilità/Risorse';
$this->params['breadcrumbs'][] = ['label' => 'Bersaglio Responsabilità/risorse', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_bersaglio, 'url' => ['view', 'id_bersaglio' => $model->id_bersaglio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="risorseumanebersaglio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
