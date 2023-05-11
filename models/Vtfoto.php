<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vtfoto".
 *
 * @property string $ftcodigo
 * @property resource|null $ftimagen
 * @property string|null $ftfoto
 */
class Vtfoto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vtfoto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ftcodigo'], 'required'],
            [['ftimagen'], 'string'],
            [['ftcodigo'], 'string', 'max' => 12],
            [['ftfoto'], 'string', 'max' => 200],
            [['ftcodigo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ftcodigo' => 'Ftcodigo',
            'ftimagen' => 'Ftimagen',
            'ftfoto' => 'Ftfoto',
        ];
    }
}
