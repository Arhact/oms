<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $id
 * @property int $id_organization
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $phone
 * @property string $squad
 * @property int $status
 * @property string $email
 *
 * @property Order[] $orders
 * @property Organization $organization
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_organization', 'login', 'password', 'name', 'phone', 'squad', 'email'], 'required'],
            [['id_organization', 'status'], 'integer'],
            [['login', 'name'], 'string', 'max' => 50],
            [['password', 'squad'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 12],
            [['email'], 'string', 'max' => 200],
            [['id_organization'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::class, 'targetAttribute' => ['id_organization' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_organization' => 'Id Organization',
            'login' => 'Login',
            'password' => 'Password',
            'name' => 'Name',
            'phone' => 'Phone',
            'squad' => 'Squad',
            'status' => 'Status',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Organization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::class, ['id' => 'id_organization']);
    }

    // -----------------------------------------------------------------
    // from file "User.php" --------------------------------------------
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // foreach (self::$users as $user) {
        //     if ($user['accessToken'] === $token) {
        //         return new static($user);
        //     }
        // }

        // return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['login'=>$username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        // return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        // return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
