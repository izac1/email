<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery_table".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $template_id
 * @property integer $status
 * @property string $delivery_name
 * @property string $title
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delivery_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'template_id', 'delivery_name', 'title'], 'required'],
            [['user_id', 'template_id', 'status'], 'integer'],
            [['delivery_name', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользыватель',
            'template_id' => 'Название шаблона',
            'status' => 'Статус',
            'delivery_name' => 'Название рассылки',
            'title' => 'Заголовок письма',
        ];
    }

    public function saveUser(){
        foreach ($this->user_id as $value) {
                $model =  new Delivery();
                $model->load(Yii::$app->request->post());
                $model->user_id = $value;
                $model->status=0;
                $model->save();
            }
            return true;
    }

    public function getStatus(){
        switch ($this->status) {
            case 0:
                return '<span class="text-muted">В очереди</span>';
                break;
            case 1:
                return '<span class="text-success">Выполнен</span>';
                break;
            case 2:
                return '<span class="text-danger">Ошибка</span>';
                break;
        }
    }

    public function getTemplate(){
        return $this->hasOne(Template::className(),['id'=>'template_id']);
    }

    public function getUser(){
        return $this->hasOne(Users::className(),['id'=>'user_id']);
    }
}
