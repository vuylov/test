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


    public static function SaveImagesWithThumbnails(array $files, $model)
    {
        foreach($files as $file)
        {
            $dbFile = new File();
            $randomName = Yii::$app->getSecurity()->generateRandomString(10);
            $dbFile->realty_id = $model->id;
            $dbFile->name       = $file->baseName;
            $dbFile->path       = 'upload/'.$randomName.'.'.$file->extension;
            $dbFile->thumbnail  = 'upload/tmb-'.$randomName.'.'.$file->extension;
            $dbFile->extension  = $file->extension;
            $dbFile->setAttribute('create_time', new Expression('CURRENT_TIMESTAMP'));
            $dbFile->save();

            $file->saveAs($dbFile->path);
            $thumbnail = Image::thumbnail($dbFile->path, 400, 300, ManipulatorInterface::THUMBNAIL_INSET);
            $thumbnail->save(Yii::getAlias('@webroot').'/'.$dbFile->thumbnail);
        }
    }
}
