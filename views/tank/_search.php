<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TankSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tank-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'contractor_id') ?>

    <?= $form->field($model, 'vin') ?>

    <?= $form->field($model, 'tank_status_id') ?>

    <?= $form->field($model, 'sections') ?>

    <?php // echo $form->field($model, 'max_weight') ?>

    <?php // echo $form->field($model, 'next_order_date') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_user_id') ?>

    <?php // echo $form->field($model, 'confirmed')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
