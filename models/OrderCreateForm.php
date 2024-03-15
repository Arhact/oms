<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Order".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_good
 * @property string $datetime
 * @property int $price
 * @property int $qt
 * @property int $status
 *
 * @property Good $good
 * @property User $user
 */
class OrderCreateForm extends Order
{
    /**
     * {@inheritdoc}
     */
    // public static function tableName()
    // {
    //     return 'Order';
    // }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_good', 'datetime', 'price', 'qt'], 'required'],
            [['id_user', 'id_good', 'price', 'qt'], 'integer'],
            [['datetime'], 'safe'],
            [['id_good'], 'exist', 'skipOnError' => true, 'targetClass' => Good::class, 'targetAttribute' => ['id_good' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function attributeLabels()
    // {
    //     return [
    //         'id' => 'ID',
    //         'id_user' => 'Id User',
    //         'id_good' => 'Id Good',
    //         'datetime' => 'Datetime',
    //         'price' => 'Price',
    //         'qt' => 'Qt',
    //         'status' => 'Status',
    //     ];
    // }

    // /**
    //  * Gets query for [[Good]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getGood()
    // {
    //     return $this->hasOne(Good::class, ['id' => 'id_good']);
    // }

    // /**
    //  * Gets query for [[User]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getUser()
    // {
    //     return $this->hasOne(User::class, ['id' => 'id_user']);
    // }
}
