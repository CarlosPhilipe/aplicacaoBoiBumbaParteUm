<?php

namespace frontend\models;

use Yii;
use frontend\models\ParteSearch;
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
    public $tempoFormatado;
    public $tempoString;
    public $tempo;
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
            [['nome'], 'required'],
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
            'apresentacao_idapresentacao' => 'Apresentação',
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

    public function afterFind()
    {
        $ps = new ParteSearch();
        $this->tempo = $ps->getTimeParte($this->idparte);

        $tempoFormatado = $this->tempoFormatado($this->tempo);
        
        $this->tempoString = $tempoFormatado['tempoString'];
        $this->tempo = $tempoFormatado['tempoFormatado'];

    }

    public function tempoFormatado($tempo)
    {
        $tempoSegundo = $tempo % 60;
        $tempoMinuto = (($tempo - $tempoSegundo) / 60);//= $this->tempoMinuto*60 + $this->tempoSegundo;
        
        $tempoSegundo = $this->zeroAEsquerda($tempoSegundo);
        $tempoMinuto = $this->zeroAEsquerda($tempoMinuto);
        
        $tempoString = $tempoMinuto.$tempoSegundo;
        $tempoFormatado= $tempoMinuto.":".$tempoSegundo;
          

        return ['tempoString' => $tempoString,'tempoFormatado' => $tempoFormatado];
    }


    private function zeroAEsquerda($var)
    {
        return ($var < 10? '0'.$var: $var);
    }

}
