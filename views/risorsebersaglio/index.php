<?php
use yii\helpers\Html;
use yii\bootstrap\Dropdown;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
 
/* @var $this yii\web\View */
/* @var $model models\Showutentistatus */
/* @var $form ActiveForm */

/**
 * Model class
 *
 */
use \app\models\Risorsebersaglio;
use \app\models\Anagrafica;
/**
 * Classes used for drop down selection
 *
 */
use app\models\Bersaglio;
 
$this->title = 'Assegna Responsabilità/Risorse';
$this->params['breadcrumbs'][] = ['label' => 'Responsabilità/Risorse', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$model = new Risorsebersaglio();
$request = Yii::$app->request;
/**
 *  Variabili locali
 *
 **/
$className = 'Risorsebersaglio';

// Lista Utenti
$anagrafica = Anagrafica::find()->orderBy(['nome' => SORT_ASC, 'cognome' => SORT_ASC])->all();
$listAnagrafiche = ArrayHelper::map($anagrafica, 'id', 'fullNameAndDate');

?>
<div class="anagrafica-statoUtente">

    <?php $form = ActiveForm::begin(['layout' => 'inline']);
                if($model->load($request->post())) {
                	$data = $request->post();
                	$model->idAnagrafica = $data[$className]['idAnagrafica'];                 } 
                 ?>

			      <?= $form->field($model, 'idAnagrafica')->dropDownList(
			                                         $listAnagrafiche,
			                                         ['prompt' => 'Seleziona utente dalla lista...',
			                                         'onChange' => 'this.form.submit();']); ?>

			     <?php 
			     if($model->idAnagrafica > 0) { 
						// Lista bersagli
                   $bersagli=Bersaglio::find()->where(['id_anagrafica' => $model->idAnagrafica])
						                                          ->orderBy(['titolo' => SORT_ASC])->all();
						$listBersagli = ArrayHelper::map($bersagli, 'id', 'titolo');			     
			     ?>
						<?= 
			          $form->field($model, 'id_bersaglio')->dropDownList(
			                                         $listBersagli,
			                                         ['prompt'=>'Seleziona bersaglio dalla lista...',
			                                         'onChange' => 'this.form.submit();']); ?>
			      <?php }
			        if($model->id_bersaglio > 0) { // Show the go button 
			            Yii::$app->response->redirect(['risorsebersaglio/update', 'id_bersaglio' =>  $model->id_bersaglio]);
                 } 
       
               ActiveForm::end(); ?>
</div>
