<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AnagraficaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anagrafica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cognome') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'sesso') ?>

    <?= $form->field($model, 'indirizzo') ?>

    <?php // echo $form->field($model, 'citta') ?>

    <?php // echo $form->field($model, 'id_provincia') ?>

    <?php // echo $form->field($model, 'id_cittadinanza') ?>

    <?php // echo $form->field($model, 'id_stato_nascita') ?>

    <?php // echo $form->field($model, 'cap') ?>

    <?php // echo $form->field($model, 'luogo_nascita') ?>

    <?php // echo $form->field($model, 'codice_catastale') ?>

    <?php // echo $form->field($model, 'data_nascita') ?>

    <?php // echo $form->field($model, 'cf') ?>

    <?php // echo $form->field($model, 'ts') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'cellulare') ?>

    <?php // echo $form->field($model, 'telefono_rif') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'id_tipo_doc') ?>

    <?php // echo $form->field($model, 'n_doc') ?>

    <?php // echo $form->field($model, 'data_ril') ?>

    <?php // echo $form->field($model, 'data_exp') ?>

    <?php // echo $form->field($model, 'id_luogo_rilascio') ?>

    <?php // echo $form->field($model, 'id_stato_civile') ?>

    <?php // echo $form->field($model, 'id_professione') ?>

    <?php // echo $form->field($model, 'id_titolo_studio') ?>

    <?php // echo $form->field($model, 'id_classificazione') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'utente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
