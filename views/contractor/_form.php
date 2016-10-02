<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Account;

/* @var $this yii\web\View */
/* @var $model app\models\Contractor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contractor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $accountQueryResult = Account::find()->all();
        $accounts = [];
        foreach ($accountQueryResult as $account) 
        {
            $accounts[$account->id] = $account->name;
        }
    ?>
    <?= $form->field($model, 'account_id')->dropDownList($accounts) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_seller')->checkbox() ?>

    <?= $form->field($model, 'is_carrier')->checkbox() ?>

    <?= $form->field($model, 'is_del')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
