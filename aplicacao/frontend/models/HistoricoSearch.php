<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Historico;

/**
 * HistoricoSearch represents the model behind the search form about `app\models\Historico`.
 */
class HistoricoSearch extends Historico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'apresentacao', 'parte', 'elemento', 'tempo_consumido', 'diferenca', 'user'], 'integer'],
            [['data_hora_termino_execucao'], 'safe'],
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
        $query = Historico::find();

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
            'id' => $this->id,
            'user' => $this->user,
            'apresentacao' => $this->apresentacao,
            'parte' => $this->parte,
            'elemento' => $this->elemento,
            'tempo_consumido' => $this->tempo_consumido,
            'diferenca' => $this->diferenca,
            'data_hora_termino_execucao' => $this->data_hora_termino_execucao,
        ]);

        return $dataProvider;
    }
}
