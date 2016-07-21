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
            [['first_name', 'last_name', 'email','is_active','is_demo','is_subscribe','is_online','is_widget','version'], 'required'],
            [['category_id','colibri_id'], 'integer'],
            [['first_name', 'last_name', 'email'], 'string', 'max' => 255],
            ['colibri_id','default','value'=>0,'isEmpty'=>function ($value) {return 0;}],
            ['category_id','default','value'=>0,'isEmpty'=>function ($value) {return 0;}],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'Адресс электронной почты',
            'category_id' => 'Категория',
            'is_active' => 'Активный Пользыватель',
            'is_demo' => 'Демо версия',
            'is_subscribe' => 'Подписан н рассылку',
            'is_online'=> 'Онлайн',
            'is_widget' => 'is_widget',
            'version' => 'Версия продукта',
        ];
    }

    public function getCategory(){
        return $this->hasOne(Categories::className(),['id'=>'category_id']);
    }
}
