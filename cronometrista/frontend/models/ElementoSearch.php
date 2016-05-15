<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Elemento;

/**
 * ElementoSearch represents the model behind the search form about `frontend\models\Elemento`.
 */
class ElementoSearch extends Elemento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tempo', 'parte_idparte', 'tipo_idtipo'], 'integer'],
            [['descricao'], 'string'],
            [['data_hora_inicio', 'data_hora_fim'], 'safe'],
            [['nome', 'posicao'], 'string', 'max' => 45],
            [['status'], 'string', 'max' => 1]
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
        $query = Elemento::find();

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
            'idelemento' => $this->idelemento,
            'tempo' => $this->tempo,
            'parte_idparte' => $this->parte_idparte,
            'tipo_idtipo' => $this->tipo_idtipo,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome]);
        $query->andFilterWhere(['like', 'descricao', $this->descricao]);
        $query = $query->orderBy([
            'nome' => SORT_ASC,
        ]);

        return $dataProvider;
    }

    public static function getIdAndName()
    {
         $query = new \yii\db\Query();

        $query = $query->select('idelemento,  nome, descricao')
        ->from('elemento');
        
        $query = $query->orderBy([
            'nome' => SORT_ASC,
        ]);
        $Elementos = $query->all();

        
        $listElemento= [];


        foreach ($Elementos as $Elemento) 
        {
            $listElemento[$Elemento['idelemento']] = $Elemento['nome'].' | Descrição: '.$Elemento['descricao']; 

        }
         
        return $listElemento;

    }

    public function getAllElementosParte($idparte)
    {
         $query = new \yii\db\Query();

        $query = $query->select(' elemento.* ')
        ->from('elemento')
        ->join('INNER JOIN', 'parte','parte.idparte = elemento.parte_idparte')
        ->where("idparte = ".$idparte);

        $elementos = $query->all();

         // echo "<br><br><br><br><br><br>";
         //  var_dump($elementos); 
        return $elementos;
    }

    public function getElementosById($id)
    {
         $query = new \yii\db\Query();

        $query = $query->select('nome', 'tempo')
        ->from('elemento')
        ->where("idelemento = ".$id);

        $elemento = $query->one();

        return $elemento;
    }    


    public function executaElemento($id)
    {
        

        // RECUPERANDO IDS
        $query = new \yii\db\Query();
         $query = $query->select('apresentacao.data_hora_inicio_execucao, apresentacao.idapresentacao, parte.idparte')
        ->from('elemento')
        ->join('INNER JOIN', 'parte','parte.idparte = elemento.parte_idparte')
        ->join('INNER JOIN', 'apresentacao','apresentacao.idapresentacao = parte.apresentacao_idapresentacao')
        ->where("idelemento = ".$id);

        $dados = $query->one();

        $inicio =  $dados['data_hora_inicio_execucao'];
        
        // CALCULO DO TEMPO DECORRIDO
        $query2 = new \yii\db\Query();
        $query2 = $query2->select('sum(tempo_consumido) as tempo')
        ->from('historico')
        ->where("apresentacao = ".$dados['idapresentacao']);

        $tempo = $query2->one();
        // echo "<br><br><br><br>";
        // var_dump($tempo);
        
        $agora = date("Y-m-d H:i:s");
        
        $tempoElemento = strtotime($agora) - strtotime($inicio) - strtotime($tempo['tempo']);

        //
        $query = $query->createCommand()->insert('historico', [
        'apresentacao' => $dados['idapresentacao'],
        'parte' => $dados['idparte'],
        'elemento' => $id,
        'tempo_consumido' => $tempoElemento ,
        ]);

        $query->execute();
    }    
}
