<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "elemento".
 *
 * @property integer $idelemento
 * @property string $nome
 * @property integer $tempo
 * @property string $descricao
 * @property string $ocorreu
 * @property string $posicao
 * @property string $data_hora_inicio
 * @property string $data_hora_fim
 * @property integer $parte_idparte
 * @property integer $tipo_idtipo
 *
 * @property Tipo $tipoIdtipo
 * @property Parte $parteIdparte
 */
class Elemento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $tempoFormatado;
    public $tempoString;

    public static function tableName()
    {
        return 'elemento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tempo', 'parte_idparte', 'tipo_idtipo'], 'integer'],
            [['descricao'], 'string'],
            [['data_hora_inicio', 'data_hora_fim'], 'safe'],
            [['nome','tempoString','tipo_idtipo', 'descricao'], 'required'],
            [['nome', 'posicao'], 'string', 'max' => 45],
            [['status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idelemento' => 'Idelemento',
            'nome' => 'Nome',
            'tempoString' => 'Tempo',
            'descricao' => 'Descricao',
            'status' => 'Status',
            'posicao' => 'Posicao',
            'data_hora_inicio' => 'Data Hora Inicio',
            'data_hora_fim' => 'Data Hora Fim',
            'parte_idparte' => 'Parte',
            'tipo_idtipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoIdtipo()
    {
        return $this->hasOne(Tipo::className(), ['idtipo' => 'tipo_idtipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParteIdparte()
    {
        return $this->hasOne(Parte::className(), ['idparte' => 'parte_idparte']);
    }

    

    public function beforeSave($insert)
    {
        $tempoString = explode(":", $this->tempoString);

        if($tempoString[1]> 59)
        {
            return false;
        }
        else
        {
            $this->tempo = $tempoString[0]*60 + $tempoString[1];
        }

        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // var_dump ($tempoString);

        //return false;
       // $this->tempo = $this->tempoMinuto*60 + $this->tempoSegundo;

        if (parent::beforeSave($insert)) 
        {
        // ...custom code here...
            return true;
        } 
        else
        {
            return false;
        }
    }

    public function afterFind()
    {
        $tempoFormatado = $this->tempoFormatado($this->tempo);
        
        $this->tempoString = $tempoFormatado['tempoString'];
        $this->tempoFormatado= $tempoFormatado['tempoFormatado'];


        // $tempoSegundo =  % 60;
        // $tempoMinuto = (($this->tempo - $tempoSegundo) / 60);//= $this->tempoMinuto*60 + $this->tempoSegundo;
        
        // $tempoSegundo = $this->zeroAEsquerda($tempoSegundo);
        // $tempoMinuto = $this->zeroAEsquerda($tempoMinuto);
        
        // $this->tempoString = $tempoMinuto.$tempoSegundo;
        // $this->tempoFormatado= $tempoMinuto.":".$tempoSegundo;
    }

    public function tempoFormatado($tempo)
    {
        $tempoSegundo = intval($tempo) % 60;
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

    public function scopes() 
    {
        return ['nome' => ['order' => 'nome DESC']];
    }
}
