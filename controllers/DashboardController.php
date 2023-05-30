<?php

namespace app\controllers;
use yii\filters\AccessControl;
use Yii;
use app\models\User;
use app\models\Bookings;

class DashboardController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'], // '@' represents authenticated users
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    return Yii::$app->response->redirect(['site/login']);
                },
            ],
        ];
    }

    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;
        $userDetails = User::findOne($user_id);
        $userProfileImage = $userDetails->profile;
        $bookings = Bookings::find()->count(); 
        $parents= User::find()->where(['role' => 'Parent'])->count();
        $babysitters= User::find()->where(['role' => 'Babysitter'])->count();
        return $this->render('index',['userProfileImage' => $userProfileImage, 'babysitters' => $babysitters,'parents' => $parents,
        'bookings' => $bookings]);
    }

}
