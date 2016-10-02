<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('app','My Company'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $user = Yii::$app->user->identity;
    $isGuest = Yii::$app->user->isGuest;
    $isAdmin = !$isGuest && (1 == $user->account_id);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            //['label' => 'Главная', 'url' => ['/site/index']],
            
            $isAdmin? ['label' => Yii::t('app', 'Users'), 'url' => ['/user/index']]: '',
            $isAdmin? ['label' => Yii::t('app', 'Accounts'), 'url' => ['/account/index']]: '',
            $isAdmin? '': ['label' => Yii::t('app', 'View my account'), 'url' => ['/account/view', 'id' => $user->account_id]],
            $isAdmin? ['label' => Yii::t('app', 'Contractors'), 'url' => ['/contractor/index']]: '',
            $isGuest? '': ['label' => Yii::t('app', 'Requests'), 'url' => ['/request/index']],
            $isGuest? '': ['label' => Yii::t('app', 'Tanks'), 'url' => ['/tank/index']],
            //$isAdmin? ['label' => Yii::t('app', 'Tracks'), 'url' => ['/track/index']]: '',
            $isAdmin? '': ['label' => Yii::t('app', 'Contacts'), 'url' => ['/site/contact']],
            $isAdmin? '': ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
            $isGuest ? (
                ['label' => Yii::t('app', 'Enter'), 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    Yii::t('app', 'Exit') . ' (' . $user->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
