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
 * @property integer $posicao
 * @property string $data_hora_inicio
 * @property string $data_hora_fim
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
            [['elemento_idelemento', 'parte_idparte', 'posicao'], 'integer'],
            [['data_hora_inicio', 'data_hora_fim'], 'safe'],
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
            'posicao' => 'Posicao',
            'data_hora_inicio' => 'Data Hora Inicio',
            'data_hora_fim' => 'Data Hora Fim',
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
            $pce->posicao = 0;
            // echo "<br><br>".($pce->save());
            $pce->save();
        }

    }

    public function getAllElementosParte($idparte)
    {
         $query = new \yii\db\Query();

        $query = $query->select('idelemento, parte_idparte, elemento_idelemento')
        ->from('parte_contem_elemento')
        ->join('INNER JOIN', 'elemento','elemento.idelemento= parte_contem_elemento.elemento_idelemento')
        ->where("parte_contem_elemento.parte_idparte = ".$idparte);

        $listElementosCkd = $query->all();

        $elementos= [];
      
        foreach ($listElementosCkd as $elementoCkd ) 
        {
            $elementos[] = $elementoCkd['elemento_idelemento']; 
        }
            
        // echo "<br><br><br><br><br><br>";
        // var_dump($elementos); 
        return $elementos;
    }
}
