<?php

namespace frontend\models;

use Yii;
use Yii\Validators\NumberValidator\Type;

/**
 * This is the model class for table "parte".
 *
 * @property integer $idparte
 * @property string $nome
 *
 * @property ParteCompoemRoteiro[] $parteCompoemRoteiros
 * @property Roteiro[] $roteiroIdroteiros
 * @property ParteContemElemento[] $parteContemElementos
 * @property Elemento[] $elementoIdelementos
 */
class Parte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $listElementos;

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
            [['nome'], 'string', 'max' => 45],
            [['listElementos'],'safe'],
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
            'listElementos' => 'Lista de elementos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParteCompoemRoteiros()
    {
        return $this->hasMany(ParteCompoemRoteiro::className(), ['parte_idparte' => 'idparte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoteiroIdroteiros()
    {
        return $this->hasMany(Roteiro::className(), ['idroteiro' => 'roteiro_idroteiro'])->viaTable('parte_compoem_roteiro', ['parte_idparte' => 'idparte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParteContemElementos()
    {
        return $this->hasMany(ParteContemElemento::className(), ['parte_idparte' => 'idparte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElementoIdelementos()
    {
        return $this->hasMany(Elemento::className(), ['idelemento' => 'elemento_idelemento'])->viaTable('parte_contem_elemento', ['parte_idparte' => 'idparte']);
    }

    public function saveAlll($parte)
    {
        
    }


}
