<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Historico;

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
            [['id', 'apresentacao', 'parte', 'elemento', 'tempo_consumido'], 'integer'],
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
            'apresentacao' => $this->apresentacao,
            'parte' => $this->parte,
            'elemento' => $this->elemento,
            'tempo_consumido' => $this->tempo_consumido,
        ]);

        return $dataProvider;
    }

    public function getAllHistorico($id)
    {
         $query = new \yii\db\Query();

        $query = $query->select('id, elemento, tempo_consumido')
        ->from('historico')
        ->where("apresentacao = ".$id)
        ->orderBy(['id' => SORT_ASC]);

        $historico = $query->all();

         // echo "<br><br><br><br><br><br>";
         //  var_dump($elementos); 
        return $historico;
    }
}
