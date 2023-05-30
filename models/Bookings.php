<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookings".
 *
 * @property int $id
 * @property string $babysitter_age_range
 * @property string $languages_spoken
 * @property string $gender
 * @property int $number_of_babysitters
 * @property string $date
 * @property string $starting_time
 * @property string $ending_time
 * @property string $email
 * @property string $phone_number
 * @property string $address
 * @property int $created_at
 * @property int $updated_at
 */
class Bookings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bookings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['babysitter_age_range', 'languages_spoken', 'gender', 'number_of_babysitters', 'date', 'starting_time', 'ending_time', 'email', 'phone_number', 'address', 'created_at', 'updated_at'], 'required'],
            [['number_of_babysitters', 'created_at', 'updated_at'], 'integer'],
            [['date', 'starting_time', 'ending_time'], 'safe'],
            [['babysitter_age_range'], 'string', 'max' => 50],
            [['languages_spoken', 'email', 'address'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 10],
            [['phone_number'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'babysitter_age_range' => 'Babysitter Age Range',
            'languages_spoken' => 'Languages Spoken',
            'gender' => 'Gender',
            'number_of_babysitters' => 'Number Of Babysitters',
            'date' => 'Date',
            'starting_time' => 'Starting Time',
            'ending_time' => 'Ending Time',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
