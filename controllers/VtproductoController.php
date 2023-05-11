<?php

namespace app\controllers;

use app\models\Vtproducto;
use app\models\VtproductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Mpdf\Mpdf;      //PHP 7.0 se instala así "$composer require mpdf/mpdf"

/**
 * VtproductoController implements the CRUD actions for Vtproducto model.
 */
class VtproductoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Vtproducto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VtproductoSearch();
        $searchModel->prdescontinuar = "0";
        $dataProvider = $searchModel->search($this->request->queryParams);
      

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

     
    }

    /**
     * Displays a single Vtproducto model.
     * @param int $prindice Prindice
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($prindice)
    {
        return $this->render('view', [
            'model' => $this->findModel($prindice),
        ]);
    }

    /**
     * Creates a new Vtproducto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Vtproducto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'prindice' => $model->prindice]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vtproducto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $prindice Prindice
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($prindice)
    {
        $model = $this->findModel($prindice);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'prindice' => $model->prindice]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vtproducto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $prindice Prindice
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($prindice)
    {
        $this->findModel($prindice)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vtproducto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $prindice Prindice
     * @return Vtproducto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($prindice)
    {
        if (($model = Vtproducto::findOne(['prindice' => $prindice])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionImprime($id)
    {
       /*  return $this->render('view_catalogo',[
            'prindice' => $id,]); */

        $pdf = new mPDF(['format' => [216,280],
                                        'margin_top' => 2,
                                        'margin_left' => 1,
                                        'margin_right' => 2,
                                        'mirrorMargins' => true
        ]);
        $this->layout = 'informes/rpt_imprime';
        $pdf->WriteHTML($this->renderPartial('view_catalogo', 
                                                            ['prindice' => $id,]
                        )); 
        $pdf->Output();
        exit;
    } 

    public function actionImprimeseleccion($prcodigo, $prgrupo, $prsubgrupo)
    {
        $this->layout = 'informes/rpt_imprime';
        return $this->render('view_catalogoseleccion', [
                                                        'prgrupo'=> $prgrupo,
                                                        'prsubgrupo'=> $prsubgrupo,
                                                        'prcodigo'=> $prcodigo,]
                                            );
    }
}