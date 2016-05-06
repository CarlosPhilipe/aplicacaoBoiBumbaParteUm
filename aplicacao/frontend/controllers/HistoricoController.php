<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Apresentacao;
use frontend\models\ApresentacaoSearch;
use frontend\models\Elemento;
use frontend\models\ElementoSearch;
use frontend\models\Historico;
use frontend\models\HistoricoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HistoricoController implements the CRUD actions for Historico model.
 */
class HistoricoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Historico models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HistoricoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Historico model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Historico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Historico();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Historico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Historico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Historico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Historico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Historico::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionInserir($apresentacao, $parte, $elemento)
    {
        $agora = date("Y-m-d H:i:s");

        $model = Apresentacao::findOne($apresentacao);
        $data_hora_inicio_execucao = $model->data_hora_inicio_execucao;

        $query = new \yii\db\Query();
        $query = $query->select('sum(tempo_consumido) as tempo')
        ->from('historico')
        ->where("apresentacao = ".$apresentacao);
        $tempo = $query->one();

        $tempo_consumido = strtotime($agora) - strtotime($data_hora_inicio_execucao) - $tempo['tempo'];

        $model = Elemento::findOne($elemento);
        $tempo = $model->tempo;

        $diferenca = $tempo_consumido - $tempo;

        $query = new \yii\db\Query();
        $query = $query->createCommand()->insert('historico', [
        'apresentacao' => $apresentacao,
        'parte' => $parte,
        'elemento' => $elemento,
        'tempo_consumido' => $tempo_consumido,
        'data_hora_termino_execucao' => $agora,
        'diferenca' => $diferenca,
        ]);
        $query->execute();

        $horas = intval($tempo_consumido / 3600);
        if ($horas<10) {
            $horas = "0".$horas;
        }
        $minutos = intval(($tempo_consumido % 3600) / 60);
        if ($minutos<10) {
            $minutos = "0".$minutos;
        }
        $segundos = intval(($tempo_consumido % 3600) % 60);
        if ($segundos<10) {
            $segundos = "0".$segundos;
        }
        $tempo_consumido = $horas.":".$minutos.":".$segundos;

        $horas = intval($diferenca / 3600);
        if ($horas<10) {
            $horas = "0".$horas;
        }
        if($diferenca>0){
            $horas = "+".$horas;
        }
        if ($diferenca<0) {
            $diferenca = $diferenca*(-1);
            $horas = "-".$horas;
        }
        $minutos = intval(($diferenca % 3600) / 60);
        if ($minutos<10) {
            $minutos = "0".$minutos;
        }
        $segundos = intval(($diferenca % 3600) % 60);
        if ($segundos<10) {
            $segundos = "0".$segundos;
        }
        $diferenca = $horas.":".$minutos.":".$segundos;

        return "<tr><td>".$model->nome."</td><td>".$tempo_consumido."</td><td>".$diferenca."</td></tr>";

    }
}
