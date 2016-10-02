<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RequestType]].
 *
 * @see RequestType
 */
class RequestTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RequestType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RequestType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
