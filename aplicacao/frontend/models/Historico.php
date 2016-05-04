<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historico".
 *
 * @property string $id
 * @property string $apresentacao
 * @property string $parte
 * @property string $elemento
 * @property string $tempo_consumido
 */
class Historico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apresentacao', 'parte', 'elemento', 'tempo_consumido'], 'required'],
            [['apresentacao', 'parte', 'elemento', 'tempo_consumido'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apresentacao' => 'Apresentacao',
            'parte' => 'Parte',
            'elemento' => 'Elemento',
            'tempo_consumido' => 'Tempo Consumido',
        ];
    }
}
