<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "parte".
 *
 * @property integer $idparte
 * @property string $nome
 * @property integer $apresentacao_idapresentacao
 *
 * @property Elemento[] $elementos
 * @property Apresentacao $apresentacaoIdapresentacao
 */
class Parte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parte';
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
            'idparte' => 'Idparte',
            'nome' => 'Nome',
            'apresentacao_idapresentacao' => 'Apresentacao Idapresentacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElementos()
    {
        return $this->hasMany(Elemento::className(), ['parte_idparte' => 'idparte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApresentacaoIdapresentacao()
    {
        return $this->hasOne(Apresentacao::className(), ['idapresentacao' => 'apresentacao_idapresentacao']);
    }
}
