<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Parte;
use frontend\models\Apresentacao;
use frontend\models\ParteContemElemento;
use frontend\models\ApresentacaoSearch;
use frontend\models\ElementoSearch;
use frontend\models\ParteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * ParteController implements the CRUD actions for Parte model.
 */
class ParteController extends Controller
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
     * Lists all Parte models.
     * @return mixed
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $idapresentacao  = isset($_SESSION['dados.apresentacao']) ? $_SESSION['dados.apresentacao'] : null;

        if ($idapresentacao == null)
        {
            return $this->redirect(['apresentacao/index']);
        }

        $searchModel = new ParteSearch();
        // para pegar somente as partes correspondentes ao id apresentacao
        $searchModel->apresentacao_idapresentacao = $idapresentacao;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $apresentacao = Apresentacao::findOne($idapresentacao);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'apresentacao' =>$apresentacao,
        ]);
    }

    /**
     * Displays a single Parte model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $session = Yii::$app->session;
        $idapresentacao  = isset($_SESSION['dados.apresentacao']) ? $_SESSION['dados.apresentacao'] : null;

        if ($idapresentacao == null)
        {
            return $this->redirect(['apresentacao/index']);
        }

       // echo "<>";
        $apresentacao = Apresentacao::findOne($idapresentacao);
        $session['dados.parte'] = $id;

        $elemento = new ElementoSearch();
        $elementos = $elemento->getAllElementosParte($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'apresentacao' =>$apresentacao,
            'listElementos' => $elementos,
        ]);
    }

    /**
     * Creates a new Parte model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Parte();
        $session = Yii::$app->session;
        
        $idapresentacao  = isset($_SESSION['dados.apresentacao']) ? $_SESSION['dados.apresentacao'] : null;

        if ($idapresentacao == null)
        {
            return $this->redirect(['apresentacao/index']);
        }
        
        $apresentacao = Apresentacao::findOne($idapresentacao);
        $model->apresentacao_idapresentacao = $apresentacao->idapresentacao;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idparte]);
        } else {
            
            return $this->render('create', [
                'model' => $model,
                'apresentacao' => $apresentacao,
            ]);
        }
    }

    /**
     * Updates an existing Parte model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $session = Yii::$app->session;
            $idapresentacao  = isset($_SESSION['dados.apresentacao']) ? $_SESSION['dados.apresentacao'] : null;

            if ($idapresentacao == null)
            {
                return $this->redirect(['apresentacao/index']);
            }
        
        $apresentacao = Apresentacao::findOne($idapresentacao);
        $model->apresentacao_idapresentacao = $apresentacao->idapresentacao;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['view', 'id' => $model->idparte]);
        } else {
            
            return $this->render('create', [
                'model' => $model,
                'apresentacao' => $apresentacao,
            ]);
        }
    }




    public function actionAddelemento($id)
    {
        $session = Yii::$app->session;
       
        $idapresentacao = $session->get('dados.apresentacao');

        if ($idapresentacao == null)
        {
            return $this->redirect(['apresentacao/index']);
        }
        $model = $this->findModel($id);

         if (!empty($model)) 
        {
            return $this->redirect(['elemento/index', 'parte' => $model->idparte]);
        } else {
            return $this->actionIndex();
        }
    }


    /**
     * Deletes an existing Parte model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Parte model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Parte the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Parte::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
