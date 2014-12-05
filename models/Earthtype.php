<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "earthtype".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Realty[] $realties
 */
class Earthtype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'earthtype';
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
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealties()
    {
        return $this->hasMany(Realty::className(), ['earthtype_id' => 'id']);
    }
}
