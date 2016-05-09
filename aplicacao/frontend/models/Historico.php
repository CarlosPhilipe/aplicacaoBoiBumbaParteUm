<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "historico".
 *
 * @property string $id
 * @property integer $apresentacao
 * @property integer $parte
 * @property integer $elemento
 * @property integer $tempo_consumido
 * @property string $data_hora_termino_execucao
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
            [['apresentacao', 'parte', 'elemento', 'tempo_consumido', 'diferenca', 'user'], 'integer'],
            [['data_hora_termino_execucao'], 'safe']
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
            'diferenca' => 'Diferença',
            'data_hora_termino_execucao' => 'Data Hora Termino Execucao',
            'user' => 'Usuário',
        ];
    }
}
