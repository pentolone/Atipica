<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * Classes used for drop down selection
 *
 */
use yii\helpers\ArrayHelper;
use app\models\Bersaglio;
use app\models\Statoattivita;

/* @var $this yii\web\View */
/* @var $model app\models\Attivita */
/* @var $form yii\widgets\ActiveForm */

$bersagli=Bersaglio::find()->select(['
                                                          bersaglio.id,
                                                          CONCAT(bersaglio.descrizione,
                                                                        \' per (\', anagrafica.nome,
                                                                        \' \', anagrafica.cognome,
                                                                        \')\') AS descrizione'                                                                        
                                                         ])
                                          ->from('bersaglio,anagrafica')
                                          ->where('bersaglio.id_anagrafica = anagrafica.id')
                                          ->orderBy(['descrizione' => SORT_ASC])->all();

$statoattivita = Statoattivita::find()->orderBy(['descrizione' => SORT_ASC])->all();

$listBersagli = ArrayHelper::map($bersagli, 'id', 'descrizione');
$listStatoAttivita = ArrayHelper::map($statoattivita, 'id', 'descrizione');

?>

<div class="attivita-form">

    <?php $form = ActiveForm::begin(['class' => 'form-vertical']); ?>

    <?= $form->field($model, 'id_bersaglio')->dropDownList(
                                        $listBersagli,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'id_stato_attivita')->dropDownList(
                                        $listStatoAttivita,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'descrizione')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_esecuzione_attivita', ['labelOptions' => [ 'class' => 'col-lg-3 control-label']])->input('date', ['class' => 'col-lg-2']) ?>

    <?= $form->field($model, 'data_chiusura_attivita', ['labelOptions' => [ 'class' => 'col-lg-2 control-label']])->input('date',['class' => 'col-lg-2']) ?><br><br>

    <?= $form->field($model, 'attivita_conclusa')->checkBox() ?>

    <?= $form->field($model, 'note', ['labelOptions' => [ 'class' => 'col-lg-3 control-label']])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'utente')->hiddenInput(['value' => 
                                 Yii::$app->user->identity->nome . ' ' . Yii::$app->user->identity->cognome])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
