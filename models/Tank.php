<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tank".
 *
 * @property string $id
 * @property string $contractor_id
 * @property string $vin
 * @property integer $tank_status_id
 * @property string $sections
 * @property string $max_weight
 * @property string $next_order_date
 * @property string $created_date
 * @property string $created_user_id
 * @property boolean $confirmed
 *
 * @property RequestedTank[] $requestedTanks
 * @property Contractor $contractor
 * @property TankStatus $tankStatus
 * @property User $createdUser
 */
class Tank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contractor_id', 'tank_status_id', 'created_user_id'], 'integer'],
            [['vin', 'sections'], 'string'],
            [['tank_status_id', 'created_user_id'], 'required'],
            [['max_weight'], 'number'],
            [['next_order_date', 'created_date'], 'safe'],
            [['confirmed'], 'boolean'],
            [['contractor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contractor::className(), 'targetAttribute' => ['contractor_id' => 'id']],
            [['tank_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TankStatus::className(), 'targetAttribute' => ['tank_status_id' => 'id']],
            [['created_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'PrimaryKey'),
            'contractor_id' => Yii::t('app', 'Contractor'),
            'vin' => Yii::t('app', 'VIN'),
            'tank_status_id' => Yii::t('app', 'Status'),
            'sections' => Yii::t('app', 'Sections'),
            'max_weight' => Yii::t('app', 'Max weight'),
            'next_order_date' => Yii::t('app', 'Next order date'),
            'created_date' => Yii::t('app', 'Registration date'),
            'created_user_id' => Yii::t('app', 'Registred by'),
            'confirmed' => Yii::t('app', 'Confirmed')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestedTanks()
    {
        return $this->hasMany(RequestedTank::className(), ['tank_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractor()
    {
        return $this->hasOne(Contractor::className(), ['id' => 'contractor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTankStatus()
    {
        return $this->hasOne(TankStatus::className(), ['id' => 'tank_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedUser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_user_id']);
    }

    /**
     * @inheritdoc
     * @return TankQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TankQuery(get_called_class());
    }
}
