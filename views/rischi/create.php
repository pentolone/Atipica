<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rischi */

$this->title = 'Inserisci nuovo Rischio';
$this->params['breadcrumbs'][] = ['label' => 'Rischi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rischi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
