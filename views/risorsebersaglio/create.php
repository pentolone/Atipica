<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Risorseumanebersaglio */

$this->title = 'Create Risorseumanebersaglio';
$this->params['breadcrumbs'][] = ['label' => 'Risorseumanebersaglios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="risorseumanebersaglio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
