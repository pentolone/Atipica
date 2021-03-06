<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AttivitaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attivita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_bersaglio') ?>

    <?= $form->field($model, 'id_stato_attivita') ?>

    <?= $form->field($model, 'descrizione') ?>

    <?= $form->field($model, 'data_esecuzione_attivita') ?>

    <?php // echo $form->field($model, 'data_chiusura_attivita') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'utente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
