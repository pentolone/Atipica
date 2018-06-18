<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Risorsebersaglio */
/* @var $form yii\widgets\ActiveForm */
/**
 * Classes used for drop down selection
 *
 */
use yii\helpers\ArrayHelper;
use app\models\Bersaglio;
use app\models\Responsabilita;
use app\models\Risorseumane;
use app\models\Risorseesterne;

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

$listBersagli = ArrayHelper::map($bersagli, 'id', 'descrizione');

$responsabilita = Responsabilita::find()->all();

//var_dump($responsabilita);
//return;
$listResponsabilita = ArrayHelper::map($responsabilita, 'id', 'titolo');
//var_dump($listResponsabilita);

$risorseUmane = Risorseumane::find()->all();

$listRisorseUmane = ArrayHelper::map($risorseUmane, 'id', 'titolo');

$ids = ArrayHelper::getColumn($responsabilita, 'id');
//var_dump($ids);
//return;
//ArrayHelper::keyExist

$risorseEsterne = Risorseesterne::find()->all();
$listRisorseEsterne = ArrayHelper::map($risorseEsterne, 'id', 'titolo');

?>

<div class="risorseumanebersaglio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bersaglio')->dropDownList(
                                        $listBersagli,
                                         ['prompt'=>'Seleziona dalla lista...',
                                          'disabled' => true]); ?>

    <?= $form->field($model, 'id_responsabilita')->checkboxList($listResponsabilita); ?><hr>

    <?= $form->field($model, 'id_risorse_umane')->checkboxList($listRisorseUmane); ?><hr>

    <?= $form->field($model, 'id_risorse_esterne')->checkboxList($listRisorseEsterne); ?><hr>

    <?= $form->field($model, 'utente')->hiddenInput(['value' => 
                                 Yii::$app->user->identity->nome . ' ' . Yii::$app->user->identity->cognome])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
