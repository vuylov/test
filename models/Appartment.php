<?php
/**
 * Created by PhpStorm.
 * User: Vuilov
 * Date: 30.10.2014
 * Time: 10:29
 */

namespace app\models;

class Appartment extends Realty
{
    const TYPE = 1;

    public static function find()
    {
        return parent::find()->where(['type_id' => self::TYPE]);
    }

    public function beforeSave($insert)
    {
        $this->type_id = self::TYPE;
        return parent::beforeSave($insert);
    }
}