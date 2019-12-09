<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $userName
 * @property string $login
 * @property string $email
 * @property string $passwordHash
 * @property string $authKey
 * @property string $token
 * @property string $createDate
 *
 * @property Activity[] $activities
 */
class UsersBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userName', 'login'], 'required'],
            [['createDate'], 'safe'],
            [['userName', 'login'], 'string', 'max' => 100],
            [['email', 'passwordHash', 'authKey', 'token'], 'string', 'max' => 200],
            ['email','email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
   /* public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'userName' => Yii::t('app', 'User Name'),
            'login' => Yii::t('app', 'Login'),
            'email' => Yii::t('app', 'Email'),
            'passwordHash' => Yii::t('app', 'Password Hash'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'token' => Yii::t('app', 'Token'),
            'createDate' => Yii::t('app', 'Create Date'),
        ];
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['id_author' => 'id']);
    }
}
