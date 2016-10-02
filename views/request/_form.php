<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RequestType;
use app\models\Contractor;

/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $typeQueryResult = RequestType::find()->where(['is_del'=>false])->all();
        $types = [];
        foreach ($typeQueryResult as $type) 
        {
            $types[$type->id] = $type->name;
        }
    ?>
    <?= $form->field($model, 'type_id')->dropDownList($types) ?>

    <?php
        $contractorQueryResult = Contractor::find()->where([
            'account_id'=>Yii::$app->user->identity->account_id,
            'is_del'=>false,
            'confirmed'=>true
        ])->all();
        $contractors = [];
        foreach ($contractorQueryResult as $contractor) 
        {
            $contractors[$contractor->id] = $contractor->name;
        }
    ?>
    <?= $form->field($model, 'contractor_id')->dropDownList($contractors) ?>

    <?= $form->field($model, 'start_point')->textInput() ?>

    <?= $form->field($model, 'end_point')->textInput() ?>
    <?= $form->field($model, 'weight')->textInput() ?>
    <?= $form->field($model, 'volume')->textInput() ?>
    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
