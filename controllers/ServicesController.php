<?php

namespace app\controllers;

use app\models\Services;
use app\models\User;
use app\models\ServicesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ServicesController implements the CRUD actions for Services model.
 */
class ServicesController extends Controller
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
     * Lists all Services models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ServicesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'userProfileImage' => $userProfileImage,
        ]);
    }

    /**
     * Displays a single Services model.
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
     * Creates a new Services model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Services();
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
                $model->updated_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
                $model->save();
                return $this->redirect(['view', 'id' => $model->id, 'userProfileImage' => $userProfileImage]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'userProfileImage' => $userProfileImage,
        ]);
    }

    /**
     * Updates an existing Services model.
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

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->created_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
            $model->updated_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
            $model->save();
            return $this->redirect(['view', 'id' => $model->id,'userProfileImage' => $userProfileImage]);
        }

        return $this->render('update', [
            'model' => $model,
            'userProfileImage' => $userProfileImage,
        ]);
    }

    /**
     * Deletes an existing Services model.
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
     * Finds the Services model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Services the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Services::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
