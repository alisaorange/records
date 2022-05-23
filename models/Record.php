<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Record extends Model
{
    public $id;
    public $name;
    public $email;
    public $phone;

    public function behaviors(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'email', 'phone'], 'required'],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'ФИО'),
            'Email' => Yii::t('app', 'e-mail'),
            'Phone' => Yii::t('app', 'Телефон'),
        ];
    }

}
