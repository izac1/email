<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "user_table".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property integer $category_id
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'email', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['firstname', 'lastname', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'email' => 'Адресс электронной почты',
            'category_id' => 'Категория',
        ];
    }

    public function getCategory(){
        return $this->hasOne(Categories::className(),['id'=>'category_id']);
    }
}
