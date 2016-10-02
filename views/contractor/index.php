<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ContractorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contractors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contractor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Contractor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            #['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name:ntext',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'inn',
                'label' => 'ИНН/КПП',
                'content' => function ($model, $key, $index, $column) {return "{$model->inn}/{$model->kpp}";}
            ],
            //'inn',
            'kpp',
            'is_seller:boolean',
            // 'is_carrier:boolean',
            // 'account_id',
            // 'is_del:boolean',
            // 'confirmed:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
