<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
//use yii\jui\DatePicker;
//use nex\datepicker\DatePicker;

/**
 * Classes used for drop down selection
 *
 */
use app\models\Province;
use app\models\Classificazione;
use app\models\Comuni;
use app\models\Nazioni;
use app\models\Statocivile;
use app\models\Professione;
use app\models\Titolostudio;
use app\models\Tipodocumento;

/* @var $this yii\web\View */
/* @var $model app\models\Anagrafica */
/* @var $form yii\widgets\ActiveForm */

// Lista province
$province=Province::find()->orderBy(['nome' => SORT_ASC])->all();
$listProvince = ArrayHelper::map($province, 'id', 'nome');

// Lista comuni italiani
$comuni=Comuni::find()->orderBy(['nome' => SORT_ASC])->all();
$listComuni = ArrayHelper::map($comuni, 'id', 'nome');

// Lista nazioni
$nazioni=Nazioni::find()->orderBy(['nazione_PS' => SORT_ASC])->all();
$listNazioni = ArrayHelper::map($nazioni, 'id', 'nazione_PS');

// Lista stato Civile
$statoCivile=StatoCivile::find()->orderBy(['descrizione' => SORT_ASC])->all();
$listStatoCivile = ArrayHelper::map($statoCivile, 'id', 'descrizione');

// Lista professione
$professione=Professione::find()->orderBy(['descrizione' => SORT_ASC])->all();
$listProfessione = ArrayHelper::map($professione, 'id', 'descrizione');

// Lista titolo di studio
$titoloStudio=TitoloStudio::find()->orderBy(['descrizione' => SORT_ASC])->all();
$listTitoloStudio = ArrayHelper::map($titoloStudio, 'id', 'descrizione');

// Lista tipo documento
$tipoDocumento=TipoDocumento::find()->orderBy(['descrizione' => SORT_ASC])->all();
$listTipoDocumento = ArrayHelper::map($tipoDocumento, 'id', 'descrizione');

// Lista classificazione
$classificazione=Classificazione::find()->orderBy(['descrizione' => SORT_ASC])->all();
$listClassificazione = ArrayHelper::map($classificazione, 'id', 'descrizione');
?>

<div class="anagrafica-form">

    <?php $form = ActiveForm::begin([
				           'id' => 'anagrafica-form',
					        'layout' => 'horizontal',
					        'fieldConfig' => [
								            'template' => "<div class=\"col-lg-2\" style=\"white-space: nowrap;\">{label}</div>\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
								            'labelOptions' => ['class' => 'col-lg-1 control-label', 'style' => 'text-align: left'],
							        ],
				]); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognome')->textInput(['maxlength' => true])->label('Ciaooo') ?>

    <?= $form->field($model, 'sesso')->dropDownList([
                                         'M' => 'Maschio',
                                         'F' => 'Femmina'],
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'indirizzo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cap')->textInput(['maxlength' => true, 'label' => 'cccc', ['template' => "<div class=\"col-lg-12\">{input}</div>"]]) ?>

    <?= $form->field($model, 'citta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_provincia')->dropDownList(
                                         $listProvince,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>
 
    <?= $form->field($model, 'id_cittadinanza')->dropDownList(
                                         $listNazioni,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>
 
    <?= $form->field($model, 'id_stato_nascita')->dropDownList(
                                         $listNazioni,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'luogo_nascita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codice_catastale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_nascita')->input('date') ?>

    <?= $form->field($model, 'cf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ts')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellulare')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_rif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <?= $form->field($model, 'id_tipo_doc')->dropDownList(
                                         $listTipoDocumento,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'n_doc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_ril')->input('date') ?>

    <?= $form->field($model, 'data_exp')->input('date') ?>

    <?= $form->field($model, 'id_luogo_rilascio')->dropDownList(
                                         $listComuni,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'id_stato_civile')->dropDownList(
                                         $listStatoCivile,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'id_professione')->dropDownList(
                                         $listProfessione,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'id_titolo_studio')->dropDownList(
                                         $listTitoloStudio,
                                         ['prompt'=>'Seleziona dalla lista...', 'value' => '0']); ?>

    <?= $form->field($model, 'id_classificazione')->dropDownList(
                                         $listClassificazione,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'utente')->hiddenInput(['value' => 
                                 Yii::$app->user->identity->nome . ' ' . Yii::$app->user->identity->cognome])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
