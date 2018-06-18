<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Responsabilitabersaglio */

$this->title = 'Create Responsabilitabersaglio';
$this->params['breadcrumbs'][] = ['label' => 'Responsabilitabersaglios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsabilitabersaglio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
