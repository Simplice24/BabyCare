<?php

namespace app\controllers;

use app\models\User;
use app\models\Languages;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\data\ActiveDataProvider;
use yii\base\Model;
use app\models\AuthItem;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                        'actions' => ['index','create','ban','update','delete','view','profile'],
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
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;
        
        $recentRegistrations = User::find()
        ->orderBy(['id' => SORT_DESC])
        ->select(['created_at', 'fullname','role'])
        ->limit(6)
        ->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'userProfileImage' => $userProfileImage,
            'recentRegistrations' => $recentRegistrations,
        ]);
    }

    public function actionBan($id, $status)
    {
        $user = User::findOne($id);
        if ($status == 10) {
            $user->status = 11; // Set the banned status code
        } else {
            $user->status = 10; // Set the unbanned status code
        }
        
        $user->updateAttributes(['status' => $user->status]);
        
        return $this->redirect(['index']);
    }



    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

     private function isUsernameUnique($username)
    {
        $existingUser = User::findOne(['username' => $username]);

        if ($existingUser === null) {
            return true; // Username is unique
        }

        return false; // Username already exists
    }

    private function isEmailUnique($email)
    {
        $existingUser = User::findOne(['email' => $email]);

        if ($existingUser === null) {
            return true; // Email is unique
        }

        return false; // Email already exists
    }

    public function actionCreate()
    {
        $model = new User();
        $role = Yii::$app->request->get('role');
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                if ($this->isUsernameUnique($model->username) && $this->isEmailUnique($model->email)){
                $model->auth_key = Yii::$app->security->generateRandomString();
                $model->created_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
                $model->updated_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
                $model->role = $role;
                $model->status = 10;
                if ($model->password_hash === $model->confirm_password) {
                    $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
                    $model->profile = 'profiles/userImage.jpg';
                    $model->save();
                    // Assign role to the user
                    $authManager = Yii::$app->authManager;
                    $roleObject = $authManager->getRole($role);
                    $authManager->assign($roleObject, $model->id);
                    return $this->redirect(['site/login']); // Redirect to the login page
                } else {
                    $model->addError('confirm_password', 'Passwords do not match.');
                }
                }else {
                    $model->addError('username', 'Username is already taken.');
                    $model->addError('email', 'Email is already taken.');
                }
                
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
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
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionProfile()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;
        $userRole = $userDetails->role;
        $languages= Languages::find()->all();

        
        
        return $this->render('profile', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'userProfileImage' => $userProfileImage,
            'languages' => $languages,
            'userRole' => $userRole,
        ]);
    }

}
