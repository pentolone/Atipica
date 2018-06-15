<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$formatter = Yii::$app->formatter;
$conclusaDisplay = $model['attivita_conclusa'] == 0 ? 'No' : 'Sì';
$colore = $model['colore'];

if($model['attivita_conclusa'] ) {
	 $colore = 'lightgray';
   }
?>
<div class="attivita">
<!--    <h3 style="color: <?= $model['colore'] . '">' . Html::encode($model['descrizione']) ?></h3> -->
        <?= '<p style="background-color: ' . $colore . ';">' . 'Descrizione: ',HtmlPurifier::process($model['descrizione']) . ' - Data prevista: ',
        HtmlPurifier::process($formatter->asDate($model['data_esecuzione_attivita'], 'long')) . ' - Data chiusura: ',
        HtmlPurifier::process($formatter->asDate($model['data_chiusura_attivita'], 'long')) . ' - Stato: ',
        HtmlPurifier::process($model['desStatoAttivita']) . ' - Conclusa: ',
        $conclusaDisplay ?></p>
 </div>