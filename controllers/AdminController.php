<?php

namespace app\controllers;
use app\models\File;
use Yii;
use yii\helpers\VarDumper;
use yii\rbac\Role;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Status;
use yii\web\UploadedFile;
use app\models\Realty;
use app\models\RealtySearch;
use app\models\Role as URole;
use yii\db\Expression;

/**
 * AdminController implements the CRUD actions for Realty model.
 */
class AdminController extends Controller
{
    public $layout = 'admin';
    public function behaviors()
    {
        return [
            'access'    => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all Realty models.
     * @return mixed
     */
    public function actionIndex()
    {
        $count = Realty::find()->count();
        return $this->render('index', compact(['count']));
    }

    /**
     * Displays a single Realty model.
     * @param integer $id
     * @throws
     * @return mixed
     */
    public function actionView($type = null, $id = null)
    {
        $model = Realty::getInstanceType($type);

        $searchModel = new RealtySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $type, Status::ACTIVE);

        if(is_null($id))
        {
            return $this->render('//realty/'.$model['folder'].'/admin/index', [
                'type'          => $type,
                'searchModel'   => $searchModel,
                'dataProvider'  => $dataProvider
            ]);
        }
        else
        {
            $realty = Realty::findOne($id);
            if($realty === null)
                throw new NotFoundHttpException('Объект не найден');

            $images = File::find()->where(['realty_id' => $realty->id])->all();

            return $this->render('//realty/'.$model['folder'].'/admin/view',[
                'model' => $realty,
                'images'=> $images
            ]);
        }
    }

    /**
     * Creates a new Realty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @param string $type
     * @throws NotFoundHttpException
     * @return mixed
     */
    public function actionCreate($type = null)
    {
        $modelView = Realty::getInstanceType($type);

        $model = new Realty();
        $model->type_id = $type;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $files = UploadedFile::getInstances($model, 'file');
            if(count($files) > 0){
                File::SaveImagesWithThumbnails($files, $model);
            }
            return $this->redirect(['view', 'type' => $type,'id' => $model->id]);
        } else {
            return $this->render('//realty/'.$modelView['folder'].'/admin/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Realty model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model  = $this->findModel($id);
        $view   = Realty::getInstanceType($model->type_id);
        $file   = File::find()->where(['realty_id' => $model->id])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $files = UploadedFile::getInstances($model, 'file');
            if(count($files) > 0){
                File::SaveImagesWithThumbnails($files, $model);
            }
            return $this->redirect(['view', 'type' => $model->type_id,'id' => $model->id]);
        } else {
            return $this->render('//realty/'.$view['folder'].'/admin/update', [
                'model' => $model,
                'file'  => $file
            ]);
        }
    }

    /**
     * Deletes an existing Realty model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);

        if(Yii::$app->user->identity->role_id == URole::ADMIN){
            File::deleteImagesByModel($model);
            $model->delete();
        }
        elseif(Yii::$app->user->identity->role_id == URole::REALTOR){
            $model->status          = Status::DEACTIVE;
            $model->deactivate_time = new Expression('CURRENT_TIMESTAMP');
            $model->save(false);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Realty model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Realty the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Realty::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
