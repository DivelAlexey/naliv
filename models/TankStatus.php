<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tank_status".
 *
 * @property integer $id
 * @property string $name
 * @property boolean $is_del
 *
 * @property Tank[] $tanks
 */
class TankStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tank_status';
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
    public function getTanks()
    {
        return $this->hasMany(Tank::className(), ['tank_status_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TankStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TankStatusQuery(get_called_class());
    }
}
