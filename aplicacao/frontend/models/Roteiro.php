<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roteiro".
 *
 * @property integer $idroteiro
 * @property string $nome
 * @property integer $apresentacao_idapresentacao
 *
 * @property ParteCompoemRoteiro[] $parteCompoemRoteiros
 * @property Parte[] $parteIdpartes
 * @property Apresentacao $apresentacaoIdapresentacao
 */
class Roteiro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roteiro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apresentacao_idapresentacao'], 'required'],
            [['apresentacao_idapresentacao'], 'integer'],
            [['nome'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idroteiro' => 'Idroteiro',
            'nome' => 'Nome',
            'apresentacao_idapresentacao' => 'Apresentacao Idapresentacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParteCompoemRoteiros()
    {
        return $this->hasMany(ParteCompoemRoteiro::className(), ['roteiro_idroteiro' => 'idroteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParteIdpartes()
    {
        return $this->hasMany(Parte::className(), ['idparte' => 'parte_idparte'])->viaTable('parte_compoem_roteiro', ['roteiro_idroteiro' => 'idroteiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApresentacaoIdapresentacao()
    {
        return $this->hasOne(Apresentacao::className(), ['idapresentacao' => 'apresentacao_idapresentacao']);
    }
}
