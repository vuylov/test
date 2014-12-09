<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
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
    /**
     * @var upload file
     */
    public $file;

    /**
     * @param null $type
     * @return null
     * @throws HttpException
     */
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
            [['type_id', 'region_id', 'price', 'address', 'detail', 'owner'], 'required', 'message' => 'Данное поле обязательно для заполненния'],
            [['type_id', 'user_id', 'region_id', 'builder_id', 'room_id', 'layout_id', 'housetype_id', 'category_id','furnish_id','earthtype_id','commercetype_id', 'price', 'status', 'square', 'square_plot'], 'integer', 'message' => 'Данное поле может быть только числовым'],
            [['detail'], 'string'],
            [['file'], 'file', 'maxFiles' => 5],
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
            'type_id' => 'Тип недвижимости',
            'user_id' => 'Пользователь системы',
            'region_id' => 'Регион',
            'builder_id' => 'Застройщик',
            'room_id' => 'Количество комнат',
            'layout_id' => 'Планировка',
            'housetype_id' => 'Тип частного дома',
            'square' => 'Площадь',
            'square_plot' => 'Площадь учатска',
            'price' => 'Цена',
            'address' => 'Адрес',
            'detail' => 'Детальная информация',
            'status' => 'Статус',
            'owner' => 'Информация о владельце',
            'create_time' => 'Дата добавления',
            'deactivate_time' => 'Дата скрытия',
            'furnish_id'    => 'Тип отделки',
            'category_id'   => 'Тип постройки',
            'file'          => 'Изображение для загрузки'
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

    /**
     * @return \yii\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id'   => 'category_id']);
    }

    /**
     * @return \yii\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['realty_id' => 'id']);
    }


    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){

            if($this->isNewRecord){
                $this->user_id      = Yii::$app->user->id;
                $this->setAttribute('create_time', new Expression('CURRENT_TIMESTAMP'));
            }
            return true;
        }
        return false;
    }
}
