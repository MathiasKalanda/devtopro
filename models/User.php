<?php

declare(strict_types=1);

namespace app\models;



use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use Yii;
/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $username
 * @property string $email
 * @property string|null $phone
 * @property string $password_hash
 * @property string $profile_image
 * @property int $role_id
 * @property string|null $last_login_at
 * @property string $created_at
 * @property string|null $auth_key
 *
 * @property Roles $role
 */

class User extends ActiveRecord implements IdentityInterface
{
   
       public function rules()
    {
        return [
            [['username', 'phone', 'last_login_at', 'auth_key'], 'default', 'value' => null],
            [['first_name', 'last_name', 'email', 'password_hash', 'role_id'], 'required'],
            [['password_hash'], 'string'],
            [['profile_image'], 'string'],
            [['role_id'], 'default', 'value' => null],
            [['role_id'], 'integer'],
            [['last_login_at', 'created_at'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 50],
            [['email', 'auth_key'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['phone'], 'unique'],
            [['username'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'email' => 'Email',
            'phone' => 'Phone',
            'password_hash' => 'Password Hash',
            'profile_image' => 'Profile Image',
            'role_id' => 'Role ID',
            'last_login_at' => 'Last Login At',
            'created_at' => 'Created At',
            'auth_key' => 'Auth Key',
        ];
    }
    public static function tableName()
    {
        return 'users';
    }
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
         return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
   public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\base\NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername(string $username)
    {
        return static::find()
        ->where(['username' => $username])
        ->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): int|string
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
   public function getAuthKey()
    {
        return $this->auth_key;
    }


    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey): bool
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword(
            $password,
            $this->password_hash
        );
    }

    public function beforeSave($insert)
{
    if (parent::beforeSave($insert)) {

        if ($insert) {
            $this->auth_key = Yii::$app->security->generateRandomString();
        }

        if (!empty($this->password)) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        }

        return true;
    }

    return false;
}

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::class, ['id' => 'role_id']);
    }    
}