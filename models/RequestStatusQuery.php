<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RequestStatus]].
 *
 * @see RequestStatus
 */
class RequestStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RequestStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RequestStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
