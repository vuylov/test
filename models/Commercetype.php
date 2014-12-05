<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "commercetype".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Realty[] $realties
 */
class Commercetype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commercetype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
        return $this->hasMany(Realty::className(), ['commercetype_id' => 'id']);
    }
}
