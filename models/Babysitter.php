<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "babysitter".
 *
 * @property int $id
 * @property int $user_id
 * @property string $languages
 * @property float|null $ratings
 * @property string|null $date_of_birth
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $user
 */
class Babysitter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'babysitter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'languages'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['ratings'], 'number'],
            [['date_of_birth'], 'safe'],
            [['languages'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'languages' => 'Languages',
            'ratings' => 'Ratings',
            'date_of_birth' => 'Date Of Birth',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
