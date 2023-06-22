<?php

namespace app\controllers;

use app\models\BabySitter;
use app\models\User;
use yii\filters\AccessControl;
use app\models\BabysitterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * BabysitterController implements the CRUD actions for BabySitter model.
 */
class BabysitterController extends Controller
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
                ],
                'denyCallback' => function ($rule, $action) {
                    return Yii::$app->response->redirect(['site/login']);
                },
            ],
        ];
    }

    /**
     * Lists all BabySitter models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BabysitterSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;
        $query = Yii::$app->db->createCommand('
        SELECT u.id, u.fullname, l.language, u.birthdate
        FROM user u
        LEFT JOIN languages_babysitter lb ON u.id = lb.babysitter_id
        LEFT JOIN languages l ON lb.language_id = l.id
        WHERE u.role = "Babysitter"
        ')->queryAll();

        $babysitters = [];
        foreach ($query as $row) {
            $babysitterId = $row['id'];
            if (!isset($babysitters[$babysitterId])) {
                $babysitters[$babysitterId] = [
                    'fullname' => $row['fullname'],
                    'languages' => [],
                    'birthdate' => $row['birthdate'],
                ];
            }
            if ($row['language'] !== null) {
                $babysitters[$babysitterId]['languages'][] = $row['language'];
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'userProfileImage' => $userProfileImage,
            'babysitters' => $babysitters,
        ]);
    }

    /**
     * Displays a single BabySitter model.
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
     * Creates a new BabySitter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BabySitter();

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
     * Updates an existing BabySitter model.
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
     * Deletes an existing BabySitter model.
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
     * Finds the BabySitter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return BabySitter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BabySitter::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
