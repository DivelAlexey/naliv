<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tanks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tank-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tank'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'contractor_id',
                'class' => 'yii\grid\DataColumn',
                'content' => function ($model, $key, $index, $column) {
                        return $model->contractor->name;
                    }
            ],
            'vin:ntext',
            [
                'attribute' => 'tank_status_id',
                'class' => 'yii\grid\DataColumn',
                'content' => function ($model, $key, $index, $column) {
                        return $model->tankStatus->name;
                    }
            ],
            'sections',
            'max_weight',
            'next_order_date',
            // 'created_date',
            // 'created_user_id',
            'confirmed:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
