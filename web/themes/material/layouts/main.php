<?php
/**
 * @var $this \yii\web\View
 * @var $content string
 */
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\widgets\Alert;

// $this->registerAssetBundle('app');
AppAsset::register($this);
?>
<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <?= Html::csrfMetaTags() ?>
  <title><?php echo Html::encode($this->title); ?></title>
  <?php $this->head(); ?>
	
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  
  <!-- CSS  -->
  <link href="<?php echo $this->theme->baseUrl ?>/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo $this->theme->baseUrl ?>/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <?php $this->beginBody() ?>
  <div class="navbar-fixed">
  <nav class="light-blue lighten-1" role="navigation">
    <div class="container">
      <div class="nav-wrapper"><a id="logo-container" href="/" class="brand-logo"><?php echo Html::img('@web/images/logo5.svg', ['alt'=>Yii::$app->name, 'height'=>'60px']); ?></a>
	  		<?php
						echo Menu::widget([
						    'options' => ['id' => "nav-mobile", 'class' => 'right side-nav'],
						    'items' => [
						        ['label' => Yii::t('app', 'NAV_HOME'), 'url' => ['/main/default/index']],
						        ['label' => Yii::t('app', 'NAW_CONTACT'), 'url' => ['/contact/default/index']],
                                ['label' => Yii::t('app', 'NAV_SIGNUP'), 'url' => ['/user/default/signup'], 'visible' => Yii::$app->user->isGuest],
						        ['label' => Yii::t('app', 'NAV_LOGIN'), 'url' => ['/user/default/login'], 'visible' => Yii::$app->user->isGuest],
                                ['label' => Yii::t('app', 'NAV_PROFILE'), 'url' => ['/user/profile/index'], 'visible' => !Yii::$app->user->isGuest],
                                !Yii::$app->user->isGuest ?
                                ['label' => Yii::t('app', 'NAV_LOGOUT').' (' . Yii::$app->user->identity->username . ')', 'url' => ['/user/default/logout'], 'template' => '<a href="{url}" data-method="post">{label}</a>', 'visible' => !Yii::$app->user->isGuest] :
                                    false,
						    ],
						]);
					?>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </div>
  </nav>
    </div>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <!--  <h1 class="header center orange-text"><?php echo Html::encode(\Yii::$app->name); ?></h1>
     <div class="row center">
        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
      </div>
      <div class="row center">
        <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>
      </div>
      <br><br>-->

    </div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 m12">
          <?php echo $content; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="mdi-image-flash-on"></i></h2> 
            <h5 class="center">Быстрое решение задач</h5>

            <p class="light">Ваши задачи или проблемы не будут откладываться на потом, они будут решаться здесь и сейчас.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="mdi-social-group"></i></h2>
            <h5 class="center">Большой опыт в области IT</h5>

            <p class="light">Все наши специалисты, проработавшие в данной сфере не менее 10 лет, имеют огромный опыт решения различных задач.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="mdi-action-settings"></i></h2>
            <h5 class="center">Передовые технологии</h5>

            <p class="light">Мы работаем только с самым свежим софтом и новейшими технологиями. Классика это хорошо, но надо идти в ногу со временем.</p>
          </div>
        </div>
      </div>
      
    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

  <footer class="orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
<!--      Made by <a class="orange-text lighten-3" href="http://materializecss.com">Materialize</a>-->
      </div>
    </div>
  </footer>  


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="<?php echo $this->theme->baseUrl ?>/js/materialize.js"></script>
  <script src="<?php echo $this->theme->baseUrl ?>/js/init.js"></script>
  
  <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage(); ?>