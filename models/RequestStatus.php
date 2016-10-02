<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request_status".
 *
 * @property integer $id
 * @property string $name
 * @property boolean $is_del
 *
 * @property Request[] $requests
 */
class RequestStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
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
            'is_del' => Yii::t('app', 'Флаг удаления статуса'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['request_status_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return RequestStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestStatusQuery(get_called_class());
    }
}
