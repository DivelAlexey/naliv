<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property string $id
 * @property string $datetime
 * @property integer $type_id
 * @property integer $request_status_id
 * @property string $contractor_id
 * @property string $created_user_id
 * @property string $accepted_user_id
 * @property string $track_id
 * @property string $close_date_time
 * @property string $start_point
 * @property string $end_point
 *
 * @property Contractor $contractor
 * @property RequestStatus $requestStatus
 * @property RequestType $type 
 * @property Track $track
 * @property User $createdUser
 * @property User $acceptedUser
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datetime', 'close_date_time'], 'safe'],
            [['type_id', 'request_status_id', 'contractor_id', 'created_user_id','start_point','end_point'], 'required'],
            [['start_point', 'end_point'], 'string'],
            [['volume', 'weight'], 'number'],
            [['type_id', 'request_status_id', 'contractor_id', 'created_user_id', 'accepted_user_id', 'track_id'], 'integer'],
            [['contractor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contractor::className(), 'targetAttribute' => ['contractor_id' => 'id']],
            [['request_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => RequestStatus::className(), 'targetAttribute' => ['request_status_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => RequestType::className(), 'targetAttribute' => ['type_id' => 'id']], 
            [['track_id'], 'exist', 'skipOnError' => true, 'targetClass' => Track::className(), 'targetAttribute' => ['track_id' => 'id']],
            [['created_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_user_id' => 'id']],
            [['accepted_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['accepted_user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'datetime' => Yii::t('app', 'Created date'),
            'type_id' => Yii::t('app', 'Type'),
            'request_status_id' => Yii::t('app', 'Status'),
            'contractor_id' => Yii::t('app', 'Seller'),
            'created_user_id' => Yii::t('app', 'Created user'),
            'accepted_user_id' => Yii::t('app', 'Confirmed user'),
            'track_id' => Yii::t('app', 'Track'),
            'close_date_time' => Yii::t('app', 'Close date'),
            'start_point' => Yii::t('app', 'Start point'),
            'end_point' => Yii::t('app', 'End point'),
            'volume' => Yii::t('app', 'Volume'),
            'weight' => Yii::t('app', 'Weight'),
            
            
        ];
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
    public function getRequestStatus()
    {
        return $this->hasOne(RequestStatus::className(), ['id' => 'request_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrack()
    {
        return $this->hasOne(Track::className(), ['id' => 'track_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedUser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcceptedUser()
    {
        return $this->hasOne(User::className(), ['id' => 'accepted_user_id']);
    }
    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getType() 
    { 
       return $this->hasOne(RequestType::className(), ['id' => 'type_id']); 
    }
    /**
     * @inheritdoc
     * @return RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestQuery(get_called_class());
    }
}
