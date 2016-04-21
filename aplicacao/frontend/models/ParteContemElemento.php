<?php

namespace frontend\models;

use Yii;
use frontend\models\Elemento;
use frontend\models\Parte;

/**
 * This is the model class for table "parte_contem_elemento".
 *
 * @property integer $elemento_idelemento
 * @property integer $parte_idparte
 * @property string $ocorreu
 *
 * @property Elemento $elementoIdelemento
 * @property Parte $parteIdparte
 */
class ParteContemElemento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parte_contem_elemento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['elemento_idelemento', 'parte_idparte'], 'required'],
            [['elemento_idelemento', 'parte_idparte'], 'integer'],
            [['ocorreu'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'elemento_idelemento' => 'Elemento Idelemento',
            'parte_idparte' => 'Parte Idparte',
            'ocorreu' => 'Ocorreu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElementoIdelemento()
    {
        return $this->hasOne(Elemento::className(), ['idelemento' => 'elemento_idelemento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParteIdparte()
    {
        return $this->hasOne(Parte::className(), ['idparte' => 'parte_idparte']);
    }

    public function saveAll($parte)
    {
        $parteContemElemento = new ParteContemElemento();
        $parteContemElemento::deleteAll('parte_idparte = '.$parte->idparte);
       // $parteContemElemento->parte_idparte = $parte->idparte;
        // echo "<br><br><br><br><br><br>";
        // var_dump($parte->idparte);
        // var_dump($parte->listElementos);
        foreach ($parte->listElementos as $idelemento) 
        {
         // echo "<br><br>".$idelemento;
            $pce = new ParteContemElemento();
            $pce->elemento_idelemento = $idelemento;
            $pce->parte_idparte = $parte->idparte;
            $pce->ocorreu = '1';
            // echo "<br><br>".($pce->save());
            $pce->save();
        }

    }
}
