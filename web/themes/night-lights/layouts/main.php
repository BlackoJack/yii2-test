<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\debug\Toolbar;

// You can use the registerAssetBundle function if you'd like
//$this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title><?php echo Html::encode($this->title); ?></title>
<meta property='og:site_name' content='<?php echo Html::encode($this->title); ?>' />
<meta property='og:title' content='<?php echo Html::encode($this->title); ?>' />
<meta property='og:description' content='<?php echo Html::encode($this->title); ?>' />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<link rel='stylesheet' type='text/css' href='<?php echo $this->theme->baseUrl; ?>/files/main_style.css' title='wsite-theme-css' />
<?php $this->head(); ?>
</head>
<body class='wsite-theme-dark tall-header-page wsite-page-index weeblypage-index'>
  <?php $this->beginBody(); ?>
<div id="wrapper">
  <table id="header">
    <tr>
      <td id="logo" rowspan="2"><span class='wsite-logo'><a href='/'><span id="wsite-title"><?php echo Html::encode(\Yii::$app->name); ?></span></a></span></td>
      <td id="header-top-right">
        <table>
          <tr>
            <td class="phone-number"></td>
            <td class="social"></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td id="header-bottom-right">
        <div class="search"></div>
      </td>
    </tr>
  </table>
  <div id="navigation">
<?php echo Menu::widget([
        'options' => ['class' => 'nav'],
        'items' => [
          ['label' => Yii::t('app', 'NAV_HOME'), 'url' => ['/main/default/index']],
          ['label' => Yii::t('app', 'NAW_CONTACT'), 'url' => ['/contact/default/index']],
          Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'NAV_SIGNUP'), 'url' => ['/user/default/signup']] :
            false,
          !Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'NAV_PROFILE'), 'url' => ['/user/profile/index']] :
            false,
          Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'NAV_LOGIN'), 'url' => ['/user/default/login']] :
            ['label' => Yii::t('app', 'NAV_LOGOUT').' (' . Yii::$app->user->identity->username .')' , 'url' => ['/user/default/logout'], 'linkOptions' => ['data-method' => 'post']],
        ],
      ]); ?>
  </div>
  <div id="banner">
    <div class="wsite-header"></div>
  </div>
  <div id="content"><div id='wsite-content' class='wsite-not-footer'>
    <?php echo $content; ?>
</div>
</div>
  <div id="footer"><?php echo Html::encode(\Yii::$app->name); ?>

</div>
</div>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>