<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property int $id_author
 * @property string $title
 * @property string $description
 * @property string $date
 * @property string $timeBegin
 * @property string $timeEnd
 * @property int $isBlocked
 * @property int $isRepeat
 * @property int $notification
 * @property string $repeatType
 * @property string $email
 * @property string $createDate
 * @property Users $author
 * @property Files[] $files
 */
class ActivityBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_author', 'title', 'description', 'date', 'timeBegin', 'timeEnd'], 'required'],
            [['id_author', 'isBlocked', 'isRepeat','notification'], 'integer'],
            [['description'], 'string'],
            [['date', 'timeBegin', 'timeEnd', 'createDate'], 'safe'],
            [['title'], 'string', 'max' => 150],
            [['repeatType'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            [['id_author'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_author' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_author' => Yii::t('app', 'Id Author'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'date' => Yii::t('app', 'Date'),
            'timeBegin' => Yii::t('app', 'Time Begin'),
            'timeEnd' => Yii::t('app', 'Time End'),
            'isBlocked' => Yii::t('app', 'Is Blocked'),
            'isRepeat' => Yii::t('app', 'Is Repeat'),
            'repeatType' => Yii::t('app', 'Repeat Type'),
            'email' => Yii::t('app', 'Email'),
            'createDate' => Yii::t('app', 'Create Date'),
            'notification'=>Yii::t('app','Notification')
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_author']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['id_activity' => 'id']);
    }
}
