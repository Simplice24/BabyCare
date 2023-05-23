<?php

namespace app\controllers;

use app\models\AuthItem;
use app\models\AuthItemChild;
use app\models\AuthItemSearch;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class AuthItemController extends Controller
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
     * Lists all AuthItem models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['type' => 2]);
        $roles = $searchModel->search($this->request->queryParams);
        $roles->query->andWhere(['type' => 1]); 
        $dataProvider->pagination->pageSize = 5;
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'userProfileImage' => $userProfileImage,
            'roles' => $roles,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $name Name
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($name)
    {
        $authItems = AuthItem::find()->where(['type' => 1])->all();
        $authItemChildren = AuthItemChild::find()->where(['parent' => $name])->all();

        return $this->render('view', [
            'model' => $this->findModel($name),
            'authItems' => $authItems,
            'authItemChildren' => $authItemChildren,
        ]);
    }


    public function actionAssign()
    {
        $request = Yii::$app->request;

        // Retrieve the submitted role and permission values
        $role = $request->post('role');
        $permission = $request->post('permission');

        // Create a new AuthItemChild model and assign the values
        $authItemChild = new AuthItemChild();
        $authItemChild->parent = $role;
        $authItemChild->child = $permission;
        $authItemChild->save();
        return $this->redirect(['index']);
        
    }    

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AuthItem();
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;
        // $type = Yii::$app->request->get('type');
        $name= Yii::$app->request->get('name');
        
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                // $model->type= $type;
                $model->created_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
                $model->updated_at = Yii::$app->formatter->asTimestamp(date('Y-m-d h:m:s'));
                $model->save();
                return $this->redirect(['view', 'name' => $model->name,'userProfileImage' => $userProfileImage]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'userProfileImage' => $userProfileImage,
            'type' => Yii::$app->request->get('type'),
        ]);
    }

    

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $name Name
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($name)
    {
        $model = $this->findModel($name);
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;
        $type = $model->type; // Assign the 'type' attribute value to the $type variable

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'name' => $model->name]);
        }
        
        return $this->render('update', [
            'model' => $model,
            'type' => $type, // Pass the $type variable to the view
        ]);
    }
    
    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $name Name
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($name)
    {
        $this->findModel($name)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $name Name
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($name)
    {
        if (($model = AuthItem::findOne(['name' => $name])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
