<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Parte;

/**
 * ElementoSearch represents the model behind the search form about `frontend\models\Elemento`.
 */
class ParteSearch extends Parte
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idparte', 'apresentacao_idapresentacao'], 'integer'],
            [['nome'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Parte::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
   
        $query->andFilterWhere([
            'idparte' => $this->idparte,
            'apresentacao_idapresentacao' => $this->apresentacao_idapresentacao,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }

    public function getAllPartesApresentacao($idapresentacao)
    {
         $query = new \yii\db\Query();

        $query = $query->select('sum(elemento.tempo) as tempo, parte.* ')
        ->from('parte')
        ->join('INNER JOIN', 'apresentacao','parte.apresentacao_idapresentacao = apresentacao.idapresentacao')
        ->join('INNER JOIN', 'elemento','parte.idparte = elemento.parte_idparte')
        ->where("idapresentacao = ".$idapresentacao)
        ->groupBy(['parte.idparte']);

        $partes = $query->all();

        // echo "<br><br><br><br><br><br>";
        //  var_dump($partes); 
        return $partes;
    }

    public function getTimeParte($idparte)
    {
         $query = new \yii\db\Query();

        $query = $query->select('sum(elemento.tempo) as tempo')
        ->from('parte')
        ->join('INNER JOIN', 'elemento','parte.idparte = elemento.parte_idparte')
        ->where("parte.idparte = ".$idparte);

        $partes = $query->one();

        //echo "<br><br><br><br><br><br>";
         //var_dump($partes['tempo']); 
        return $partes['tempo'];
    }



}
