<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $role_id
 * @property string $email
 * @property string $password
 * @property string $surname
 * @property string $firstname
 * @property string $phone
 * @property integer $status
 * @property string $create_time
 * @property string $lastvisit_time
 * @property string $deactivate_time
 *
 * @property Realty[] $realties
 * @property Role $role
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'status'], 'integer'],
            [['email', 'password', 'surname', 'firstname', 'phone'], 'required'],
            [['create_time', 'lastvisit_time', 'deactivate_time'], 'safe'],
            [['email'], 'string', 'max' => 50],
            [['password', 'surname', 'firstname', 'phone'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'email' => 'Email',
            'password' => 'Password',
            'surname' => 'Surname',
            'firstname' => 'Firstname',
            'phone' => 'Phone',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'lastvisit_time' => 'Lastvisit Time',
            'deactivate_time' => 'Deactivate Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealties()
    {
        return $this->hasMany(Realty::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Finds an identity by the given ID
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInteface|null the identity object that matches the given ID
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        throw new NotSupportedException("getAuthKey is not implemented");
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException("findIdentityByAccessToken is not implemented");
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        throw new NotSupportedException("validateAuthKey is not implemented");
    }

    /**
     * Find use by email
     *
     * @param string $email user email
     * @return User|null the user ActiveRecord
     */
    public static function findByUserEmail($email)
    {
        return static::find()->andWhere(
            ['and', ['email'    => $email], ['status' => Status::ACTIVE]]
        )->one();
    }

    /**
     * Validate password
     *
     * @param string $password user password
     * @return bool if the password valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function getFullname()
    {
        return $this->surname.' '.$this->firstname;
    }
}
