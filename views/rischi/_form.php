<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * Classes used for drop down selection
 *
 */
use yii\helpers\ArrayHelper;
use app\models\Bersaglio;

/* @var $this yii\web\View */
/* @var $model app\models\Rischi */
/* @var $form yii\widgets\ActiveForm */

// Lista bersagli e anagrafica
//$bersagli=Bersaglio::find()->orderBy(['descrizione' => SORT_ASC])->all();

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
?>

<div class="rischi-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'id_bersaglio')->dropDownList(
                                        $listBersagli,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

   <?= $form->field($model, 'titolo')->textInput() ?>

    <?= $form->field($model, 'descrizione')->textarea(['rows' => 6]) ?>
  
    <?= $form->field($model, 'utente')->hiddenInput(['value' => 
                                 Yii::$app->user->identity->nome . ' ' . Yii::$app->user->identity->cognome])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
