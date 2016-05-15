<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Item;

/**
 * ItemSearch represents the model behind the search form about `frontend\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iditem'], 'integer'],
            [['nome', 'descricao'], 'safe'],
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
        $query = Item::find();

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
            'iditem' => $this->iditem,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'imagem', $this->imagem]);

        return $dataProvider;
    }


    public static function getIdAndName()
    {
         $query = new \yii\db\Query();

        $query = $query->select('iditem,  nome')
        ->from('item');
        
        $query = $query->orderBy([
            'nome' => SORT_ASC,
        ]);
        $itens = $query->all();

        
        $listItens= [];


        foreach ($itens as $item) 
        {
            $listItens[] = ['iditem' => $item['iditem'], 'nome' => $item['nome']]; 

        }
             
            //$triagemPre = ['triagens'=> $triagemPre] ;
        return $listItens;

    }
}
