<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "languages_babysitter".
 *
 * @property int $id
 * @property int $language_id
 * @property int $babysitter_id
 *
 * @property User $babysitter
 * @property Languages $language
 */
class LanguagesBabysitter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'languages_babysitter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['language_id', 'babysitter_id'], 'required'],
            [['language_id', 'babysitter_id'], 'integer'],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::class, 'targetAttribute' => ['language_id' => 'id']],
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
            'language_id' => 'Language ID',
            'babysitter_id' => 'Babysitter ID',
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
     * Gets query for [[Language]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Languages::class, ['id' => 'language_id']);
    }
}
