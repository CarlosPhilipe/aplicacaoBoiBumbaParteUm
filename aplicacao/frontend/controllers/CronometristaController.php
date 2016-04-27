<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Elemento;
use frontend\models\ElementoSearch;
use frontend\models\Apresentacao;
use frontend\models\ApresentacaoSearch;
use frontend\models\Parte;
use frontend\models\Tipo;
use frontend\models\TipoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CronometristaController implements the CRUD actions for Elemento model.
 */
class CronometristaController extends Controller
{
    public function behaviors()
    {
        return [
        'access' => [
                'class' => AccessControl::className(),
                'only' => ['executar','create','index', 'update', 'view', 'delete'],
                'rules' => [
                    [
                        'actions' => ['executar','create','index', 'update', 'view'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            if(!Yii::$app->user->isGuest)
                            {
                                return Yii::$app->user->identity->grupoacesso == 'estagiario_juridico' ;
                            }
                        }
                    ],
                    [
                        'actions' => ['executar','create','index', 'update', 'view', 'delete'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            if(!Yii::$app->user->isGuest)
                            {
                                return Yii::$app->user->identity->grupoacesso == 'servidor_juridico' ;
                            }
                        }
                    ],
                    [
                        'actions' => ['executar','create','index', 'update', 'view', 'delete'],
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

    public function actionExecutar()
    {

        $session = Yii::$app->session;
        $idapresentacao  = $session->get('dados.apresentacao');

        if ($idapresentacao == null)
        {
            return $this->redirect(['apresentacao/index']);
        }


        $apresentacao = Apresentacao::findOne($idapresentacao);
        $search = new ApresentacaoSearch();
        $listElementos = $search->getAllElementosApresentacao($idapresentacao);


        return $this->render('executar', [
            'apresentacao' => $apresentacao,
            'listElementos' =>$listElementos,
        ]);
    }




    /**
     * Lists all Elemento models.
     * @return mixed
     */
    // public function actionIndex()
    // {
    //     $session = Yii::$app->session;
    //     $idapresentacao  = $session->get('dados.apresentacao');
    //     $idparte = $session->get('dados.parte');

    //     if ($idapresentacao == null || $idparte == null)
    //     {
    //         return $this->redirect(['apresentacao/index']);
    //     }

    //     $parte  = Parte::findOne($idparte);
    //     $apresentacao = Apresentacao::findOne($idapresentacao);
    //     $searchModel = new ElementoSearch();
    //     $searchModel->parte_idparte = $idparte;
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //         'parte' => $parte,
    //         'apresentacao' => $apresentacao,
    //     ]);
    // }

    // /**
    //  * Displays a single Elemento model.
    //  * @param integer $id
    //  * @return mixed
    //  */
    // public function actionView($id)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }

    // /**
    //  * Creates a new Elemento model.
    //  * If creation is successful, the browser will be redirected to the 'view' page.
    //  * @return mixed
    //  */
    // public function actionCreate()
    // {
    //     $model = new Elemento();
    //     $tipo = TipoSearch::getIdAndName();

    //     $session = Yii::$app->session;
    //     $idparte = $session->get('dados.parte');

    //     if ($idparte == null)
    //     {
    //         return $this->redirect(['apresentacao/index']);
    //     }

    //     $model->parte_idparte = $idparte;

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->actionIndex();
    //         //return $this->redirect(['view', 'id' => $model->idelemento]);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //             'tipo' => $tipo,
    //         ]);
    //     }
    // }

    // /**
    //  * Updates an existing Elemento model.
    //  * If update is successful, the browser will be redirected to the 'view' page.
    //  * @param integer $id
    //  * @return mixed
    //  */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);
    //     $tipo = TipoSearch::getIdAndName();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->actionIndex();
    //     } else {
    //         return $this->render('update', [
    //             'model' => $model,
    //             'tipo' => $tipo,
    //         ]);
    //     }
    // }

    // /**
    //  * Deletes an existing Elemento model.
    //  * If deletion is successful, the browser will be redirected to the 'index' page.
    //  * @param integer $id
    //  * @return mixed
    //  */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    // /**
    //  * Finds the Elemento model based on its primary key value.
    //  * If the model is not found, a 404 HTTP exception will be thrown.
    //  * @param integer $id
    //  * @return Elemento the loaded model
    //  * @throws NotFoundHttpException if the model cannot be found
    //  */
    // protected function findModel($id)
    // {
    //     if (($model = Elemento::findOne($id)) !== null) {
    //         return $model;
    //     } else {
    //         throw new NotFoundHttpException('The requested page does not exist.');
    //     }
    // }
}
