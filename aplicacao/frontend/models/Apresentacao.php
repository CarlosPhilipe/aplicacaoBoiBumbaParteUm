<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "apresentacao".
 *
 * @property integer $idapresentacao
 * @property string $nome
 * @property string $data_hora_inicio
 * @property string $data_hora_fim
 *
 * @property Roteiro[] $roteiros
 */
class Apresentacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apresentacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_hora_inicio', 'data_hora_fim'], 'safe'],
            [['nome'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nome' => 'Nome da Apresentacao',
            'data_hora_inicio' => 'Data e Hora do Inicio',
            'data_hora_fim' => 'Data e Hora do Fim',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoteiros()
    {
        return $this->hasMany(Roteiro::className(), ['apresentacao_idapresentacao' => 'idapresentacao']);
    }
}
