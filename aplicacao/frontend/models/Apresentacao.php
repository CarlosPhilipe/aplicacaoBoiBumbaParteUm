<?php

namespace frontend\models;

use Yii;
use frontend\models\ApresentacaoSearch;

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
    public $tempoFormatado;
    public $tempoString;
    public $tempo;
    public $tempoApresentacao;
    public $tempoPlanejado;

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
            [['data_hora_inicio', 'data_hora_fim', 'data_hora_inicio_execucao'], 'safe'],
            [['aberta'],'boolean'],
            [['nome','aberta', 'data_hora_inicio', 'data_hora_fim'],'required'],
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
            'tempoPlanejado' => 'Duração'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoteiros()
    {
        return $this->hasMany(Roteiro::className(), ['apresentacao_idapresentacao' => 'idapresentacao']);
    }
    public function afterFind()
    {
        $ps = new ApresentacaoSearch();
        $this->tempo = $ps->getTimeApresentacao($this->idapresentacao);
        $tempoFormatado = $this->tempoFormatado($this->tempo);
        
        $this->tempoString = $tempoFormatado['tempoString'];
        $this->tempo = $tempoFormatado['tempoFormatado'];

         $inicio = strToTime($this->data_hora_inicio);
         $fim = strToTime($this->data_hora_fim);

         $tempoPlanejado = $fim - $inicio;
         $this->tempoPlanejado = $this->tempoFormatado($tempoPlanejado)['tempoFormatado'];

         $this->tempoApresentacao = $tempoPlanejado;
    }

    public function tempoFormatado($tempo)
    {
        $tempoSegundo = $tempo % 60;
        $restante = (($tempo - $tempoSegundo) / 60);//= $this->tempoMinuto*60 + $this->tempoSegundo;
        
        $tempoMinuto = $restante % 60;

        $tempoHora = ($restante - $tempoMinuto)/60;

        $tempoHora = $this->zeroAEsquerda($tempoHora);
        $tempoSegundo = $this->zeroAEsquerda($tempoSegundo);
        $tempoMinuto = $this->zeroAEsquerda($tempoMinuto);
        
        $tempoString = $tempoMinuto.$tempoSegundo;
        $tempoFormatado= $tempoHora.":".$tempoMinuto.":".$tempoSegundo;
          

        return ['tempoString' => $tempoString,'tempoFormatado' => $tempoFormatado];
    }


    private function zeroAEsquerda($var)
    {
        return ($var < 10? '0'.$var: $var);
    }

}

