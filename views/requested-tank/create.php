<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RequestedTank */

$this->title = Yii::t('app', 'Create Requested Tank');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Requested Tanks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requested-tank-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
