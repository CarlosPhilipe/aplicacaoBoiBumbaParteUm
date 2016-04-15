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
            [['descricao'], 'string'],
          //  [['tipo_idtipo'], 'required'],
            [['nome'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idelemento' => 'Id elemento',
            'nome' => 'Nome',
            'tempo' => 'Tempo',
            'descricao' => 'Descricao',
            'tipo_idtipo' => 'Tipo Idtipo',
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
}
