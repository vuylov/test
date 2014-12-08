<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property integer $realty_id
 * @property string $name
 * @property string $extension
 * @property string $create_time
 *
 * @property Realty $realty
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['realty_id', 'name','path', 'extension'], 'required'],
            [['realty_id'], 'integer'],
            [['create_time'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['extension'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'realty_id' => 'Realty ID',
            'name' => 'Name',
            'extension' => 'Extension',
            'create_time' => 'Create Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealty()
    {
        return $this->hasOne(Realty::className(), ['id' => 'realty_id']);
    }
}
