<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tipo;

/**
 * ElementoSearch represents the model behind the search form about `frontend\models\Tipo`.
 */
class TipoSearch extends Tipo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtipo'], 'integer'],
          //  [['tipo_idtipo'], 'required'],
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
        $query = Tipo::find();

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
            'idtipo' => $this->idtipo,
            'nome' => $this->tempo,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }


    public static function getIdAndName()
    {
         $query = new \yii\db\Query();

        $query = $query->select('idtipo,  nome')
        ->from('tipo');
        
        $query = $query->orderBy([
            'nome' => SORT_ASC,
        ]);
        $tipos = $query->all();

        
        $listTipos= [];
        $bairroId = [];


        foreach ($tipos as $tipo) 
        {
            $listTipos[] = ['idtipo' => $tipo['idtipo'], 'nome' => $tipo['nome']]; 

        }
             
            //$triagemPre = ['triagens'=> $triagemPre] ;
        return $listTipos;

    }
}
