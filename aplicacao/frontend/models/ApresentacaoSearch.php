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

    public function getInicioExecucao($idapresentacao)
    {
         $query = new \yii\db\Query();

        $query = $query->select('data_hora_inicio_execucao')
        ->from('apresentacao')
        ->where("idapresentacao = ".$idapresentacao);

        $inicioExecucao = $query->one();

        return $inicioExecucao;
    }

    public function getAllElementosApresentacao($idapresentacao)
    {
        $query = new \yii\db\Query();

        $query = $query->select('elemento.*')
        ->from('elemento')
        ->join('INNER JOIN', 'parte','parte.idparte = elemento.parte_idparte')
        ->join('INNER JOIN', 'apresentacao','parte.apresentacao_idapresentacao = apresentacao.idapresentacao')
        ->where("idapresentacao = ".$idapresentacao);
        $elementos = $query->all();

         // echo "<br><br><br><br><br><br>";
         //  var_dump($partes['tempo']); 
        return $elementos;
    }

    public function getPrevisaoExecutados($idapresentacao)
    {
        $tempoCadastradoExecutado = 0;
        $tempoCadastradoNaoExecutado = 0;
        $tempoContabilizado = 0;
        $tempoRestante = 0;
        $previsao = 0;
        

        $elementosCadastrados = $this->getAllElementosApresentacao($idapresentacao);

        foreach ($elementosCadastrados as $elemento) {
            if ($elemento['status']=='c') {
                $tempoCadastradoExecutado += intval($elemento['tempo']);
            }
            if ($elemento['status']=='a') {
                $tempoCadastradoNaoExecutado += intval($elemento['tempo']);
            }

            $apresentacao = Apresentacao::findOne($idapresentacao);
            $elementosHistorico = Historico::find()
                ->where(['apresentacao' => $idapresentacao, 'parte' => $elemento['parte_idparte'], 'elemento' => $elemento['idelemento']])
                ->andWhere(['>', 'data_hora_termino_execucao', $apresentacao->data_hora_inicio_execucao])
                ->all();

            foreach ($elementosHistorico as $elementoHistorico) {
                $tempoContabilizado += intval($elementoHistorico['tempo_consumido']);
            }   
        }

        $duracao = strtotime($apresentacao->data_hora_fim) - strtotime($apresentacao->data_hora_inicio);
        $decorrido = strtotime(date("Y-m-d H:i:s")) - strtotime($apresentacao->data_hora_inicio_execucao);
        $tempoRestante = $duracao - $decorrido;

        $previsao = $tempoRestante-$tempoCadastradoNaoExecutado;

        $tempoCadastradoExecutado = $this->formataHHMMSS($tempoCadastradoExecutado);
        $tempoCadastradoNaoExecutado = $this->formataHHMMSS($tempoCadastradoNaoExecutado);
        $tempoContabilizado = $this->formataHHMMSS($tempoContabilizado);
        $tempoRestante = $this->formataHHMMSS($tempoRestante);
        $previsao = $this->formataPlusHHMMSS($previsao);

        // $tabelalinhas = "<td>".$tempoCadastradoExecutado."</td><td>".$tempoContabilizado."</td><td>".$tempoCadastradoNaoExecutado."</td><td>".$tempoRestante."</td><td><b>".$previsao."</b></td>";
    

        $tabelalinhas = '<div class="row vdivide">
                                <div class="col-sm-4 text-center">
                                    <h2>Tempo Restante</h2>
                                    <button class="btn-cronometrista btn-primary">'.$tempoCadastradoNaoExecutado.'</button>
                                </div>'.
                                '<div class="col-sm-4 text-center">
                                    <h2>Regresivo</h2>
                                    <button class="btn-cronometrista btn-primary">'.$tempoRestante.'</button>
                                </div>'.
                                '<div class="col-sm-4 text-center">
                                    <h2>Previsão</h2>
                                    <button class="btn-cronometrista btn-primary">'.$previsao.'</button>
                                </div>
                        </div>';

        return $tabelalinhas;
    }

    function formataHHMMSS($tseg){

        if ($tseg<0) {
            $tseg = $tseg*(-1);
        }

        $horas = intval($tseg / 3600);
        if ($horas<10) {
            $horas = "0".$horas;
        }
        $minutos = intval(($tseg % 3600) / 60);
        if ($minutos<10) {
            $minutos = "0".$minutos;
        }
        $segundos = intval(($tseg % 3600) % 60);
        if ($segundos<10) {
            $segundos = "0".$segundos;
        }

        return $horas.":".$minutos.":".$segundos;
    }

    function formataPlusHHMMSS($tseg){
        $time = '';

        if ($tseg<0) {
            $tseg = $tseg*(-1);
            $time = '+';
        }

        elseif ($tseg>0) {
            $time = '-';
        }

        $horas = intval($tseg / 3600);
        if ($horas<10) {
            $horas = "0".$horas;
        }
        $minutos = intval(($tseg % 3600) / 60);
        if ($minutos<10) {
            $minutos = "0".$minutos;
        }
        $segundos = intval(($tseg % 3600) % 60);
        if ($segundos<10) {
            $segundos = "0".$segundos;
        }

        return $time.$horas.":".$minutos.":".$segundos;
    }
}
