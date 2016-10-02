<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contractor".
 *
 * @property string $id
 * @property string $name
 * @property string $inn
 * @property string $kpp
 * @property boolean $is_seller
 * @property boolean $is_carrier
 * @property string $account_id
 * @property boolean $is_del
 *
 * @property Request[] $requests
 * @property Tank[] $tanks
 */
class Contractor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contractor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['inn', 'account_id'], 'required'],
            [['is_seller', 'is_carrier', 'is_del'], 'boolean'],
            [['account_id'], 'integer'],
            [['inn'], 'string', 'max' => 12],
            [['kpp'], 'string', 'max' => 9],
            [['inn', 'kpp'], 'unique', 'targetAttribute' => ['inn', 'kpp'], 'message' => 'The combination of ИНН организации. Обязателен к заполнению, может быть либо 10 символов (для ЮЛ), либо 12 (для ИП) and Должен быть только у ЮЛ, всегда 9 символов has already been taken.'],
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
            'inn' => Yii::t('app', 'INN'),
            'kpp' => Yii::t('app', 'KPP'),
            'is_seller' => Yii::t('app', 'Seller'),
            'is_carrier' => Yii::t('app', 'Carrier'),
            'account_id' => Yii::t('app', 'Account'),
            'is_del' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['contractor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTanks()
    {
        return $this->hasMany(Tank::className(), ['contractor_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ContractorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContractorQuery(get_called_class());
    }
}
