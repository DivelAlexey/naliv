<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requested_tank".
 *
 * @property string $id
 * @property string $tank_id
 *
 * @property Tank $tank
 */
class RequestedTank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requested_tank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tank_id'], 'required'],
            [['tank_id'], 'integer'],
            [['tank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tank::className(), 'targetAttribute' => ['tank_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Первичный ключ таблицы'),
            'tank_id' => Yii::t('app', 'Указатель на конкретную цистерну'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTank()
    {
        return $this->hasOne(Tank::className(), ['id' => 'tank_id']);
    }

    /**
     * @inheritdoc
     * @return RequestedTankQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestedTankQuery(get_called_class());
    }
}
