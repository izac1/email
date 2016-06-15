<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "template_table".
 *
 * @property integer $id
 * @property string $template_name
 * @property string $filename
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'template_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['template_name'], 'required'],
            [['template_name'], 'string', 'max' => 255],
            ['template_name', 'unique', 'targetAttribute' => ['template_name'], 'message' => 'Название шаблона должно быть уникально.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'template_name' => 'Название шаблона',
            'filename' => 'Название файла',
        ];
    }

    
}
