<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Dropdown;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use app\assets\AppAsset;
use app\models\SubMenu;
use app\models\MainMenu;
//use app\Yii;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
   $s = new SubMenu();
   //$mainMenu = $s->buildDynamicMenu();
  
  // if(!$mainMenu) {
   	$menuItems = [
   	                          ['label' => 'Home', 'url' => ['/site/index']],
   	                          ['label' => 'Informazioni', 'url' => ['/site/about']],
                             ['label' => 'Contatti', 'url' => ['/site/contact']],
   	                         ];

     if(Yii::$app->user->isGuest) {
         $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
         //var_dump($menuItems);
         //return;
         }
     else {
     	   $menuItems = $s->buildDynamicMenu();

         $menuItems[] = '<li>'  . Html::a('Logout (' . Yii::$app->user->identity->nome . ' ' .  Yii::$app->user->identity->cognome . ')' 
         , ['/site/logout'], ['data-method' => 'post']).'</li>';
 
 /*         . Html::beginForm(['/site/logout'], 'post')
          . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->nome . ' ' .  Yii::$app->user->identity->cognome. ')',
//            'Logout (' . Yii::$app->user->identity->username. ')',
            ['class' => 'btn btn-link']
            )
        . Html::endForm()
        . '</li>'; */
       } 
 
   NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
 
    ]); 
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Atipica <?= date('Y') ?></p>

        <p class="pull-right"><?=  isset(Yii::$app->params['poweredBy']) ? Yii::$app->params['poweredBy'] : Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
