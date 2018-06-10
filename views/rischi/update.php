<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rischi */

$this->title = 'Aggiorna rischio: ' . $model->titolo;
$this->params['breadcrumbs'][] = ['label' => 'Rischi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->titolo, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rischi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
