<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Users".
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
 * @property Orders[] $orders
 * @property Organizations $organization
 */
class Regform extends Users
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_organization', 'login', 'password', 'name', 'phone', 'email'], 'required', 'message'=>'Поле обязательно для заполнения'],
            [['id_organization', 'status'], 'integer'],
            [['login', 'name'], 'string', 'max' => 50],
            [['password', 'squad'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 12],
            [['email'], 'string', 'max' => 200],
            [['id_organization'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::class, 'targetAttribute' => ['id_organization' => 'id']],
            
            [['login', 'name'], 'match', 'pattern'=>'/^.{5,}$/u', 'message'=>'минимум 5 символов'],
            ['login', 'match', 'pattern'=>'/^[A-Za-z\s\-]{1,}$/u', 'message'=>'только латинница'],
            ['name', 'match', 'pattern'=>'/^[А-Яа-я\s\-]{1,}$/u', 'message'=>'только кириллица'],
            ['phone', 'match', 'pattern'=>'/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/u', 'message'=>'введите телефон в формате +79998887766'],
            ['password', 'match', 'pattern'=>'/^.{6,}$/u', 'message'=>'минимум 6 символов'],
            ['email', 'match', 'pattern'=>'/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u', 'message'=>'введите корректный email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_organization' => 'Организация',
            'login' => 'Логин',
            'password' => 'Пароль',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'squad' => 'Squad',
            'status' => 'Status',
            'email' => 'Почта email',
        ];
    }
    
    /**
     * Gets query for [[Organization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organizations::class, ['id' => 'id_organization']);
    }
}
