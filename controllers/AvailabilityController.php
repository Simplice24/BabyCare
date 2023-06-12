<?php

namespace app\controllers;

use app\models\Availability;
use app\models\User;
use app\models\AvailabilitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * AvailabilityController implements the CRUD actions for Availability model.
 */
class AvailabilityController extends Controller
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
     * Lists all Availability models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AvailabilitySearch();
        $model =new Availability();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'userProfileImage' => $userProfileImage,
        ]);
    }

    /**
     * Displays a single Availability model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'userProfileImage' => $userProfileImage,
        ]);
    }

    /**
     * Creates a new Availability model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Availability();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = $_POST['date'];
            $starting_time = $_POST['starting_time'];
            $ending_time = $_POST['ending_time'];
            $model->user_id = Yii::$app->user->id;
            $model->created_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
            $model->updated_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
            $model->date = $date;
            $model->starting_time = $starting_time;
            $model->ending_time = $ending_time;
            $model->save();
            return $this->redirect(['index']);
            // Redirect or perform further actions
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Availability model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id,'userProfileImage' => $userProfileImage]);
        }

        return $this->render('update', [
            'model' => $model,
            'userProfileImage' => $userProfileImage,
        ]);
    }

    /**
     * Deletes an existing Availability model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Availability model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Availability the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Availability::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
