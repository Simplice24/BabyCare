<?php

namespace app\controllers;

use app\models\Bookings;
use yii\filters\AccessControl;
use app\models\BookingsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Services;
use yii\db\Expression;
use Yii;

/**
 * BookingsController implements the CRUD actions for Bookings model.
 */
class BookingsController extends Controller
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
                        'allow' => true,
                        'actions' => ['index','create','view','delete','update'],
                        'roles' => ['@'], // '@' represents authenticated users
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['?'], // '?' represents unauthenticated users
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    return Yii::$app->response->redirect(['site/login']);
                },
            ],
        ];
    }

    /**
     * Lists all Bookings models.
     *
     * @return string
     */
    public function actionIndex()
{
    $searchModel = new BookingsSearch();
    $user_id = Yii::$app->user->id;
    $userDetails = User::findOne($user_id);
    $userProfileImage = $userDetails->profile;

    // Fetch the last five bookings
    $recentBookings = Bookings::find()
    ->orderBy(['id' => SORT_DESC])
    ->select(['created_at', 'number_of_babysitters','languages_spoken','babysitter_age_range'])
    ->limit(6)
    ->all();


    $age_range='20-25';
    $language= 'English';
    $ageRangeArray = explode('-', $age_range);
    $lowerAge = $ageRangeArray[0];
    $upperAge = $ageRangeArray[1];

    $babysitters = User::find()
    ->select('u.fullname')
    ->from('user u')
    ->leftJoin('languages_babysitter lb', 'lb.babysitter_id = u.id')
    ->leftJoin('languages l', 'l.id = lb.language_id')
    ->where(['u.role' => 'Babysitter'])
    ->andWhere(['BETWEEN', 'u.birthdate', date("Y-m-d", strtotime("-{$upperAge} years")), date("Y-m-d", strtotime("-{$lowerAge} years"))])
    ->andWhere(['l.language' => $language])
    ->column();

    var_dump($babysitters);
    
    $dataProvider = $searchModel->search($this->request->queryParams);
    $dataProvider->pagination->pageSize = 10; // Customize the number of records per page
    
    // return $this->render('index', [
    //     'searchModel' => $searchModel,
    //     'dataProvider' => $dataProvider,
    //     'userProfileImage' => $userProfileImage,
    //     'recentBookings' => $recentBookings,
    // ]);
}


    /**
     * Displays a single Bookings model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bookings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bookings();
        $services = Services::find()->select('service')->orderBy('service')->column();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
                $model->updated_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
                $model->save();
                return $this->redirect(['site/index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'services' => $services,
        ]);
    }

    /**
     * Updates an existing Bookings model.
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
     * Deletes an existing Bookings model.
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
     * Finds the Bookings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Bookings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bookings::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
