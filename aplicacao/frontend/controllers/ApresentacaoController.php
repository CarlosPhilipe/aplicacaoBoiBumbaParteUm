<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Apresentacao;
use frontend\models\ParteSearch;
use frontend\models\ElementoSearch;
use frontend\models\TipoSearch;
use frontend\models\ApresentacaoSearch;
use frontend\models\Historico;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ApresentacaoController implements the CRUD actions for Apresentacao model.
 */
class ApresentacaoController extends Controller
{
    public function behaviors()
    {
        return [
        'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','index', 'update', 'view', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create','index', 'update', 'view'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            if(!Yii::$app->user->isGuest)
                            {
                                return Yii::$app->user->identity->grupoacesso == 'estagiario_juridico' ;
                            }
                        }
                    ],
                    [
                        'actions' => ['create','index', 'update', 'view', 'delete'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            if(!Yii::$app->user->isGuest)
                            {
                                return Yii::$app->user->identity->grupoacesso == 'servidor_juridico' ;
                            }
                        }
                    ],
                    [
                        'actions' => ['create','index', 'update', 'view', 'delete'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            if(!Yii::$app->user->isGuest)
                            {
                                return Yii::$app->user->identity->grupoacesso == 'gestor' ;
                            }
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Apresentacao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApresentacaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCronometrista($id)
    {
        $model = $this->findModel($id);

        $session = Yii::$app->session;

        // check if a session is already open
        // echo "<br><br><br><br><br><br><br>".$session->isActive;
        if (!$session->isActive)
        {
            // open a session
            $session->open();
        }
        // aqui seto o id da apresentacao
        $session['dados.apresentacao'] = $id;

        //echo "<br><br><br><br><br><br><br>";
        //var_dump($model);
        if (!empty($model)) 
        {
            return $this->redirect(['cronometrista/executar']);
        } else {
            return $this->actionIndex();
        }
    }

    public function actionExecutar_apresentacao($id)
    {

        $model = $this->findModel($id);

        if ($model->status_execucao == 0) {
            Yii::$app->db->createCommand()->update('apresentacao', ['data_hora_inicio_execucao' => date("Y-m-d H:i:s"), 'data_hora_termino_execucao' => null, 'status_execucao' => 1], 'idapresentacao = '.$id)->execute();
        }

        // Cálculo dos segundos do inicio da execução
        $datetimedb = $model->data_hora_inicio_execucao;
        $date_time_db = explode(" ", $datetimedb);
        $timedb = explode(":", $date_time_db[1]);
        $segundosdb = (intval($timedb[0])*3600)+(intval($timedb[1])*60)+intval($timedb[2]);

        // Cáculo dos segundos do horário atual
        $datetimenow = explode(" ", date("Y-m-d H:i:s"));
        $timenow = explode(":", $datetimenow[1]);
        $segundosnow = (intval($timenow[0])*3600)+(intval($timenow[1])*60)+intval($timenow[2]);
        
        // Geração dos parâmetros de tempo
        $diferenca = $segundosnow-$segundosdb;
        $horas = $diferenca / 3600;
        $minutos = ($diferenca % 3600) / 60 ;
        $segundos = ($diferenca % 3600) % 60;

        // Geração do parametro das partes
        $parte = new ParteSearch();
        $partes = $parte->getAllPartesApresentacao($id);


        return $this->render('cronometro', [
            'id' => $model->idapresentacao,
            'nome' => $model->nome,
            'status' => $model->status_execucao,
            'datetimedb' => $datetimedb,
            'segundos' => $segundos,
            'minutos' => $minutos,
            'horas' => $horas,
            'partes' => $partes,
        ]);

    }

public function actionExecutar_elemento($id, $elemento)
    {
       // echo $elemento."<br>";
        $elementoDAO = new ElementoSearch();
        $elementoDAO->executaElemento($elemento);

        return $this->actionExecutar_apresentacao($id);

    }



    public function actionParar_apresentacao($id)
    {
        $model = $this->findModel($id);

        $parte = new ParteSearch();
        $partes = $parte->getAllPartesApresentacao($id);

        if($model->status_execucao == 1){
            Yii::$app->db->createCommand()->update('apresentacao', ['data_hora_termino_execucao' => date("Y-m-d H:i:s"), 'status_execucao' => 0], 'idapresentacao = '.$id)->execute();
        }

        $elementosApresentacao = new ApresentacaoSearch();
        $elementosApresentacao = $elementosApresentacao->getAllElementosApresentacao($id);
        foreach ($elementosApresentacao as $elemento) {
            Yii::$app->db->createCommand()->update('elemento', ['status' => 'a'], 'idelemento = '.$elemento['idelemento'])->execute();
        }

        return $this->render('cronometro', [
            'id' => $model->idapresentacao,
            'nome' => $model->nome,
            'status' => $model->status_execucao,
            'datetimedb' => null,
            'segundos' => null,
            'minutos' => null,
            'horas' => null,
            'partes' => $partes,
        ]);

    }




    /**
     * Displays a single Apresentacao model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
       // echo "<>";
        $session = Yii::$app->session;

        // check if a session is already open
        // echo "<br><br><br><br><br><br><br>".$session->isActive;
        if (!$session->isActive)
        {
            // open a session
            $session->open();
        }
        // aqui seto o id da apresentacao
        $session['dados.apresentacao'] = $id;

        // Geração do parametro das partes
        $parte = new ParteSearch();
        $partes = $parte->getAllPartesApresentacao($id);
    
        return $this->render('view', [
            'model' => $this->findModel($id),
            'partes' => $partes,
        ]);
    }

    /**
     * Creates a new Apresentacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Apresentacao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idapresentacao]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Apresentacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            return $this->redirect(['view', 'id' => $model->idapresentacao]);
        } else {
            return $this->render('update', [
                'model' => $model,

            ]);
        }
    }

    

    public function actionSeguer($id)
    {
        $model = $this->findModel($id);

        $parte = new ParteSearch();
        $partes = $parte->getAllPartesApresentacao($id);
       // echo "<>";
        $session = Yii::$app->session;

        // check if a session is already open
        // echo "<br><br><br><br><br><br><br>".$session->isActive;
        if (!$session->isActive)
        {
            // open a session
            $session->open();
        }
        // aqui seto o id da apresentacao
        $session['dados.apresentacao'] = $id;

        //echo "<br><br><br><br><br><br><br>";
        //var_dump($model);
        if (!empty($model)) 
        {
            return $this->redirect(['parte/index', 'apresentacao' => $model->idapresentacao, 'apresentacaoObj' =>$model]);
        } else {
            return $this->actionIndex();
        }
    }

    /**
     * Deletes an existing Apresentacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

     public function actionPrevisao($id)
    {
        $searchModel = new ApresentacaoSearch();
        $previsao = $searchModel->getPrevisaoExecutados($id);

        return $previsao;
    }

    /**
     * Finds the Apresentacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Apresentacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apresentacao::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
