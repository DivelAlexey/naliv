<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "way_point".
 *
 * @property string $id
 * @property string $name
 * @property boolean $is_del
 *
 * @property Track[] $tracks
 * @property Track[] $tracks0
 * @property WayPoint[] $endPoints
 * @property WayPoint[] $startPoints
 */
class WayPoint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'way_point';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['is_del'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Первичный ключ таблицы'),
            'name' => Yii::t('app', 'Название'),
            'is_del' => Yii::t('app', 'Флаг удаления'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTracks()
    {
        return $this->hasMany(Track::className(), ['start_point_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTracks0()
    {
        return $this->hasMany(Track::className(), ['end_point_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEndPoints()
    {
        return $this->hasMany(WayPoint::className(), ['id' => 'end_point_id'])->viaTable('track', ['start_point_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStartPoints()
    {
        return $this->hasMany(WayPoint::className(), ['id' => 'start_point_id'])->viaTable('track', ['end_point_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return WayPointQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WayPointQuery(get_called_class());
    }
}
