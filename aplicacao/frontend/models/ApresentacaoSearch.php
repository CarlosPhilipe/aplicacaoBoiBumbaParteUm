<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Apresentacao;

/*
* * ApresentacaoSearch represents the model behind the search form about `frontend\models\Apresentacao`.
 */
class ApresentacaoSearch extends Apresentacao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_hora_inicio', 'data_hora_fim'], 'safe'],
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
        $query = Apresentacao::find();

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
            'data_hora_inicio' => $this->data_hora_inicio,
            'data_hora_fim' => $this->data_hora_fim,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome]);
        $query = $query->orderBy([
            'nome' => SORT_ASC,
        ]);

        return $dataProvider;
    }

    public static function getIdAndName()
    {
         $query = new \yii\db\Query();

        $query = $query->select('idapresentacao,  nome')
        ->from('apresentacao');
        
        $query = $query->orderBy([
            'nome' => SORT_ASC,
        ]);
        $tipos = $query->all();

        
        $listTipos= [];
        $bairroId = [];


        foreach ($tipos as $tipo) 
        {
            $listTipos[] = ['idapresentacao' => $tipo['idapresentacao'], 'nome' => $tipo['nome']]; 

        }
             
            //$triagemPre = ['triagens'=> $triagemPre] ;
        return $listTipos;

    }

    public function getTimeApresentacao($idapresentacao)
    {
         $query = new \yii\db\Query();

        $query = $query->select('sum(elemento.tempo) as tempo')
        ->from('parte')
        ->join('INNER JOIN', 'apresentacao','parte.apresentacao_idapresentacao = apresentacao.idapresentacao')
        ->join('INNER JOIN', 'elemento','parte.idparte = elemento.parte_idparte')
        ->where("idapresentacao = ".$idapresentacao)
        ->groupBy(['idapresentacao']);

        $partes = $query->one();

         // echo "<br><br><br><br><br><br>";
         //  var_dump($partes['tempo']); 
        return $partes['tempo'];
    }
}
