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
            [['tempo', 'tipo_idtipo'], 'integer'],
            [['descricao'], 'string'],
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
            'tipo_idtipo' => $this->tipo_idtipo,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome]);
        $query->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
