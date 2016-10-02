<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Contractor;
use app\models\TankStatus;

/* @var $this yii\web\View */
/* @var $model app\models\Tank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tank-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
        $contractorsQueryResult = Contractor::find()->where(['is_del'=>false, 'account_id'=>Yii::$app->user->getIdentity()->account_id])->all();
        $contractors = [];
        foreach ($contractorsQueryResult as $contractor) 
        {
            $contractors[$contractor->id] = $contractor->name;
        }
    ?>
    <?= $form->field($model, 'contractor_id')->dropDownList($contractors) ?>
    
    <?php
        $tankStatusQueryResult = TankStatus::find()->where(['is_del'=>false])->all();
        $tank_statuses = [];
        foreach ($tankStatusQueryResult as $tank_status) 
        {
            $tank_statuses[$tank_status->id] = $tank_status->name;
        }
    ?>
    <?= $form->field($model, 'tank_status_id')->dropDownList($tank_statuses) ?>

    <?= $form->field($model, 'vin')->textInput() ?>

    <?= $form->field($model, 'sections')->textInput() ?>

    <?= $form->field($model, 'max_weight')->textInput() ?>

    <?= $form->field($model, 'next_order_date')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
