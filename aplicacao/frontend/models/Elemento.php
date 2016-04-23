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
 * @property integer $tipo_idtipo
 *
 * @property Tipo $tipoIdtipo
 * @property ParteContemElemento[] $parteContemElementos
 * @property Parte[] $parteIdpartes
 */

class Elemento extends \yii\db\ActiveRecord
{

    public $tempoFormatado;
    public $tempoString;
    /**
     * @inheritdoc
     */
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
            [['tempo', 'tipo_idtipo'], 'integer'],
            [['descricao', 'tempoString'], 'string'],
            [['descricao','nome','tipo_idtipo','tempoString'], 'required'],
            [['nome'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idelemento' => 'Elemento',
            'nome' => 'Nome',
            'tempo' => 'Tempo em segundos',
            'descricao' => 'Descrição',
            'tipo_idtipo' => 'Tipo',
            'tempoString' => 'Tempo', 
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
    public function getParteContemElementos()
    {
        return $this->hasMany(ParteContemElemento::className(), ['elemento_idelemento' => 'idelemento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParteIdpartes()
    {
        return $this->hasMany(Parte::className(), ['idparte' => 'parte_idparte'])->viaTable('parte_contem_elemento', ['elemento_idelemento' => 'idelemento']);
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

    public function scopes() 
    {
        return ['nome' => ['order' => 'nome DESC']];
    }
}
