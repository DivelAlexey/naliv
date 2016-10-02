<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Request */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-view">

    <h1><?= Html::encode(Yii::t('app', 'Request {ID} from {datetime}', ['ID' => $this->title, 'datetime'=> $model->datetime]) . ' ' . ' ') ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'datetime',
            'start_point',
            'end_point',
            'volume',
            'weight',
            [
                'label' => Yii::t('app','Type'),
                'value' => $model->type->name
            ],
            [
                'label' => Yii::t('app','Status'),
                'value' => $model->requestStatus->name
            ],
            [
                'label' => Yii::t('app','Contractor'),
                'value' => $model->contractor->name
            ],
            [
                'label' => Yii::t('app','Created user'),
                'value' => $model->createdUser->title
            ],
            [
                'label' => Yii::t('app','Confirmed user'),
                'value' => $model->acceptedUser->name
            ],
            'close_date_time',
        ],
    ]) ?>

</div>
