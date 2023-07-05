<?php

namespace app\controllers;

use app\models\Assignment;
use app\models\User;
use app\models\Bookings;
use app\models\AssignmentSearch;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * AssignmentController implements the CRUD actions for Assignment model.
 */
class AssignmentController extends Controller
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
                        'actions' => ['index','create','view','delete','update'],
                        'roles' => ['@', 'Admin'], // '@' represents authenticated users
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
     * Lists all Assignment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AssignmentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;
    
        // Get the ID of the authenticated user
        $userId = Yii::$app->user->identity->id;
    
        // Modify the query to filter records where 'babysitter_id' equals the authenticated user's ID
        $dataProvider->query->andWhere(['babysitter_id' => $userId]);
    
        // Eager load the 'booking' relation to fetch associated records from the 'Bookings' table
        $dataProvider->query->with('booking');
    
        // Fetch all records from the data provider
        $models = $dataProvider->getModels();
    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'userProfileImage' => $userProfileImage,
            'models' => $models,
        ]);
    }
    


    /**
     * Displays a single Assignment model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;
    
        $assignment = $this->findModel($id);
        $bookingId = $assignment->booking_id;
        $booking = Bookings::findOne($bookingId);
    
        return $this->render('view', [
            'assignment' => $assignment,
            'booking' => $booking,
            'userProfileImage' => $userProfileImage,
        ]);
    }
    

    /**
     * Creates a new Assignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Assignment();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Assignment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Assignment model.
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
     * Finds the Assignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Assignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Assignment::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
