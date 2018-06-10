<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Province;

/* @var $this yii\web\View */
/* @var $model app\models\Comuni */
/* @var $form yii\widgets\ActiveForm */
$province=Province::find()->orderBy(['nome' => SORT_ASC])->all();
$listProvince = ArrayHelper::map($province, 'id', 'nome');
?>

<div class="comuni-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_provincia')->dropDownList(
                                         $listProvince,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'cap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codice_catastale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codice_PS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'utente')->hiddenInput(['value' => 
                                 Yii::$app->user->identity->nome . ' ' . Yii::$app->user->identity->cognome])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
