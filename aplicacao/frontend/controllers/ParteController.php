<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Parte;
use frontend\models\Apresentacao;
use frontend\models\ParteContemElemento;
use frontend\models\ApresentacaoSearch;
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
        return $this->render('view', [
            'model' => $this->findModel($id),
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
        $idapresentacao  = isset($_SESSION['dados.apresentacao']) ? $_SESSION['dados.apresentacao'] : null;

        if ($idapresentacao == null)
        {
            return $this->redirect(['apresentacao/index']);
        }

        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // echo "string";
            $pce = new ParteContemElemento();
            $pce->saveAll($model);
            
            return $this->actionIndex();

            //return $this->actionOrdenate($model->idparte);//actionIndex();
        } else {
            $apresentacao = Apresentacao::findOne($idapresentacao);

            return $this->render('create', [
                'model' => $model,
                'apresentacao ' => $apresentacao,
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
         $elementos = ElementoSearch::getIdAndName();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $pce = new ParteContemElemento();
            $pce->saveAll($model);
            return $this->actionIndex();
        } 
        else
        {
            $pce = new ParteContemElemento();
            $elementosCkd = $pce->getAllIdsParte($model->idparte);

            $model->listElementos = $elementos;
            return $this->render('update', [
                 'model' => $model,
                 'elementos' => $elementos,
                 'elementosCkd' => $elementosCkd,
            ]);
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



    public function actionOrdenate($id)
    {
        $model = $this->findModel($id);

        //  echo "<br><br><br><br><br><br>";
        // var_dump(Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
             echo "string";
            return $this->actionIndex();
        }
        else
        { 
            $pce = new ParteContemElemento();
            $elementos= $pce->getAllElementosParte($model->idparte);

            $model->listElementos = $elementos;
            return $this->render('ordenate', [
                'model' => $model,
                 'elementos' => $elementos,
            ]);
        }
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
