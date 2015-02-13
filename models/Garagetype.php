<?php
/**
 * Created by PhpStorm.
 * User: Vuilov
 * Date: 21.01.2015
 * Time: 16:14
 */

namespace app\models;


class Garagetype extends \yii\db\ActiveRecord{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'garagetype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Тип гаража',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealties()
    {
        return $this->hasMany(Realty::className(), ['garagetype_id' => 'id']);
    }
}
