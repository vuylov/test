<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\HttpException;

/**
 * This is the model class for table "realty".
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $region_id
 * @property integer $builder_id
 * @property integer $room_id
 * @property integer $layout_id
 * @property integer $housetype_id
 * @property string $square
 * @property string $square_plot
 * @property string $price
 * @property string $address
 * @property string $detail
 * @property integer $status
 * @property string $owner
 * @property string $create_time
 * @property string $deactivate_time
 *
 * @property Builder $builder
 * @property Housetype $housetype
 * @property Layout $layout
 * @property Room $room
 * @property Type $type
 * @property User $user
 */
class Realty extends ActiveRecord
{
    public static function getInstanceType($type = null)
    {
        if(is_null($type))
        {
            throw new HttpException(404, 'Bad type parameter');
        }
        $types = [
            '1' => [
                'class' => '\app\models\Appartment',
                'folder'=> 'appartment'
            ],
            '2' => [
                'class' => '\app\models\Liverent',
                'folder'=> 'liverent'
            ],
            '3' => [
                'class' => '\app\models\Share',
                'folder'=> 'share'
            ],
            '4' => [
                'class' => '\app\models\House',
                'folder'=> 'house'
            ],
            '6' => [
                'class' => '\app\models\Earth',
                'folder'=> 'earth'
            ],
            '7' => [
                'class' => '\app\models\Garage',
                'folder'=> 'garage'
            ],
            '8' => [
                'class' => '\app\models\Sell',
                'folder'=> 'sell'
            ],
            '9' => [
                'class' => '\app\models\Rent',
                'folder'=> 'rent'
            ],
        ];
        $type = ($types[$type])?$types[$type]:null;
        if(!$type)
            throw new HttpException(404, 'Realty does not know this instance');
        return $type;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'realty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'region_id', 'price', 'address', 'detail'], 'required'],
            [['type_id', 'user_id', 'region_id', 'builder_id', 'room_id', 'layout_id', 'housetype_id', 'price', 'status'], 'integer'],
            [['detail'], 'string'],
            [['create_time', 'deactivate_time'], 'safe'],
            [['square', 'square_plot', 'address', 'owner'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'user_id' => 'User ID',
            'region_id' => 'Region ID',
            'builder_id' => 'Builder ID',
            'room_id' => 'Room ID',
            'layout_id' => 'Layout ID',
            'housetype_id' => 'Housetype ID',
            'square' => 'Square',
            'square_plot' => 'Square Plot',
            'price' => 'Price',
            'address' => 'Address',
            'detail' => 'Detail',
            'status' => 'Status',
            'owner' => 'Owner',
            'create_time' => 'Create Time',
            'deactivate_time' => 'Deactivate Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuilder()
    {
        return $this->hasOne(Builder::className(), ['id' => 'builder_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHousetype()
    {
        return $this->hasOne(Housetype::className(), ['id' => 'housetype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLayout()
    {
        return $this->hasOne(Layout::className(), ['id' => 'layout_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFurnish()
    {
        return $this->hasOne(Furnish::className(), ['id' => 'furnish_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEarthtype()
    {
        return $this->hasOne(Earthtype::className(), ['id' => 'earthtype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommercetype()
    {
        return $this->hasOne(Commercetype::className(), ['id' => 'commercetype_id']);
    }
}
