<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TankStatus */

$this->title = Yii::t('app', 'Create Tank Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tank Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tank-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
