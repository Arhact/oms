<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Price".
 *
 * @property int $id
 * @property int $id_good
 * @property int $retail
 * @property int $wholesale
 * @property int $qt
 * @property string $datetime
 *
 * @property Good $good
 * 
 * 
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_good', 'retail', 'wholesale', 'qt', 'datetime'], 'required'],
            [['id_good', 'retail', 'wholesale', 'qt'], 'integer'],
            [['datetime'], 'safe'],
            [['id_good'], 'exist', 'skipOnError' => true, 'targetClass' => Good::class, 'targetAttribute' => ['id_good' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_good' => 'Id Good',
            'retail' => 'Retail',
            'wholesale' => 'Wholesale',
            'qt' => 'Qt',
            'datetime' => 'Datetime',
        ];
    }

    /**
     * Gets query for [[Good]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGood()
    {
        return $this->hasOne(Good::class, ['id' => 'id_good']);
    }
}
