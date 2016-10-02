<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request_type".
 *
 * @property string $id
 * @property string $name
 * @property boolean $is_del
 *
 * @property Request[] $requests
 */
class RequestType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['is_del'], 'boolean'],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'is_del' => Yii::t('app', 'Флаг удаления'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['type_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return RequestTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestTypeQuery(get_called_class());
    }
}
