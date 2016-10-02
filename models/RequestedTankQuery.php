<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RequestedTank]].
 *
 * @see RequestedTank
 */
class RequestedTankQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RequestedTank[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RequestedTank|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
