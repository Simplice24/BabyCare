<?php

namespace app\controllers;

use app\models\Feedbacks;
use app\models\User;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use app\models\FeedbacksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * FeedbacksController implements the CRUD actions for Feedbacks model.
 */
class FeedbacksController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => Yii::$app->user->can('Admin'),
                        'actions' => ['index','view','delete','update','activate'],
                        'roles' => ['@','Admin'], // '@' represents authenticated users
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['?'], // '?' represents unauthenticated users
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    if (\Yii::$app->user->isGuest) {
                        return $action->controller->redirect(['site/login']);
                    } else {
                        throw new ForbiddenHttpException('You are not allowed to access this page.');
                    }
                },
            ],
        ];
    }

    /**
     * Lists all Feedbacks models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FeedbacksSearch();
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
     * Displays a single Feedbacks model.
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
     * Creates a new Feedbacks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Feedbacks();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
                $model->updated_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
                $model->status = 0;
                $model->save();
                return $this->redirect(Yii::$app->request->referrer);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Feedbacks model.
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

    public function actionActivate($id)
    {
        $model = $this->findModel($id);
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;
        $model->created_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
        $model->updated_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
        if($model->status==0){
            $model->status = 1;
        }else{
            $model->status =0;
        }
        $model->save();
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Deletes an existing Feedbacks model.
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
     * Finds the Feedbacks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Feedbacks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Feedbacks::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
