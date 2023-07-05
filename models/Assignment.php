<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assignment".
 *
 * @property int $id
 * @property int|null $booking_id
 * @property int|null $babysitter_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $babysitter
 * @property Bookings $booking
 */
class Assignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['booking_id', 'babysitter_id', 'created_at', 'updated_at'], 'integer'],
            [['booking_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bookings::class, 'targetAttribute' => ['booking_id' => 'id']],
            [['babysitter_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['babysitter_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'booking_id' => 'Booking ID',
            'babysitter_id' => 'Babysitter ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Babysitter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBabysitter()
    {
        return $this->hasOne(User::class, ['id' => 'babysitter_id']);
    }

    /**
     * Gets query for [[Booking]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooking()
    {
        return $this->hasOne(Bookings::class, ['id' => 'booking_id']);
    }
}
