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

    public $tempoMinuto;
    public $tempoSegundo;
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
            [['tempo','tempoMinuto','tempoSegundo', 'tipo_idtipo'], 'integer'],
            [['descricao'], 'string'],
            [['descricao','nome','tipo_idtipo','tempoMinuto','tempoSegundo'], 'required'],
            [['tempoSegundo'], 'integer', 'max' => 59, 'min'=>0],
            [['tempoMinuto'], 'integer','max' => 60, 'min'=>0],
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
            'tempoMinuto' => 'Duração Minutos',
            'tempoSegundo' => 'Segundos', 
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

        $this->tempo = $this->tempoMinuto*60 + $this->tempoSegundo;

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

        $this->tempoSegundo = $this->tempo % 60;
        $this->tempoMinuto = (($this->tempo - $this->tempoSegundo) / 60);//= $this->tempoMinuto*60 + $this->tempoSegundo;
        
    }

}
