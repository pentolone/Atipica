<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\bootstrap\Progress;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model models\Showutentistatus */
/* @var $form ActiveForm */
 
$this->title = 'Visualizzo dettaglio utente';
$this->params['breadcrumbs'][] = ['label' => 'Stato utente', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

// Percentuali su progressbar
$formatter = Yii::$app->formatter;
// -> 18 anni
$futurePercentage18 = ($model->giorniUtili18*100)/$model->giorniTotali18;
$pastPercentage18 = 100 - $futurePercentage18;
$labelPassato18 = 'Dal ' . $formatter->asDate($model->dataNascita, 'long') . ' (' . round($pastPercentage18, 1) . '%)';
$labelFuturo18 = 'DIsponibile (' . (100-round($pastPercentage18, 1)) .'%)';

// -> 21 anni
$futurePercentage21 = ($model->giorniUtili21*100)/$model->giorniTotali21;
$pastPercentage21 = 100 - $futurePercentage21;
$labelPassato21 = 'Dal ' . $formatter->asDate($model->dataNascita, 'long') . ' (' . round($pastPercentage21, 1) . '%)';
$labelFuturo21 = 'DIsponibile (' . (100-round($pastPercentage21, 1)) .'%)';

//$futurePercentage = ($model->giorniUtili*100)/$model->giorniTotali;
//$pastPercentage = 100 - $futurePercentage;


?>
<div class="anagrafica-showUtentiStatus">
       <?=  DetailView::widget([
               'model' => $model,        
               'attributes' => [
               'nomeUtente',
               'titoloBersaglio',
               ],
             ]),
 
         Tabs::widget([
          'items' => [
                    ['label' => $model->ages[0], 'active' => true, 
			            'content' =>	 Progress::widget([
					            'bars' => [
					                           ['percent' => $pastPercentage18, 'label' => $labelPassato18, 'options' => ['class' => 'progress-bar-danger']],
					                           ['percent' => $futurePercentage18, 'label' => $labelFuturo18, 'options' => ['class' => 'progress-bar-success']],
					                           ],
					                      ]),
					                    ],
                    ['label' => $model->ages[1], 'active' => false, 
					         'content' => Progress::widget([
					            'bars' => [
					                           ['percent' => $pastPercentage21, 'label' => $labelPassato21, 'options' => ['class' => 'progress-bar-danger']],
					                           ['percent' => $futurePercentage21, 'label' => $labelFuturo21, 'options' => ['class' => 'progress-bar-success']],
					                           ],
					                      ]),
				                      ],
			                      ],
		                      ]),

         Tabs::widget([
          'items' => [
                    ['label' => 'Attività', 'active' => true, 
                     'content' => ListView::widget([
				                            'dataProvider' => $model->datiAttivita,
				                            'itemView' => '_attivita',
                                        ]),
                   ],
                    ['label' => 'Rischi', 'active' => false,
                     'content' => ListView::widget([
				                            'dataProvider' => $model->datiRischio,
				                            'itemView' => '_rischi',
                                        ]),
                    ],

                    ['label' => 'Indicatori', 'active' => false,
                     'content' => ListView::widget([
				                            'dataProvider' => $model->datiIndicatore,
				                            'itemView' => '_indicatori',
                                        ]),
                 ],

                    ['label' => 'Responsabilità', 'active' => false,
                     'content' => 'Responsabilità...',
                    ],

                    ['label' => 'Risorse umane', 'active' => false,
                     'content' => 'Risorse umane blabla...',
                    ],

                    ['label' => 'Risorse esterne', 'active' => false,
                     'content' => 'Risorse esterne blabla...',
                    ],
                 ],
          ])  ?>

 
</div>
