<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "track".
 *
 * @property string $id
 * @property string $start_point_id
 * @property string $end_point_id
 * @property integer $length
 *
 * @property Request[] $requests
 * @property WayPoint $startPoint
 * @property WayPoint $endPoint
 */
class Track extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'track';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_point_id', 'end_point_id'], 'required'],
            [['start_point_id', 'end_point_id', 'length'], 'integer'],
            [['start_point_id', 'end_point_id'], 'unique', 'targetAttribute' => ['start_point_id', 'end_point_id'], 'message' => 'The combination of Указатель на начальную точку маршрута and Указатель на конечную точку маршрута has already been taken.'],
            [['start_point_id'], 'exist', 'skipOnError' => true, 'targetClass' => WayPoint::className(), 'targetAttribute' => ['start_point_id' => 'id']],
            [['end_point_id'], 'exist', 'skipOnError' => true, 'targetClass' => WayPoint::className(), 'targetAttribute' => ['end_point_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'start_point_id' => Yii::t('app', 'Start point'),
            'end_point_id' => Yii::t('app', 'Указатель на конечную точку маршрута'),
            'length' => Yii::t('app', 'Длинна пути в километрах'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['track_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStartPoint()
    {
        return $this->hasOne(WayPoint::className(), ['id' => 'start_point_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEndPoint()
    {
        return $this->hasOne(WayPoint::className(), ['id' => 'end_point_id']);
    }

    /**
     * @inheritdoc
     * @return TrackQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TrackQuery(get_called_class());
    }
}
