<?php

namespace app\controllers;
use yii\filters\AccessControl;
use Yii;
use app\models\User;
use app\models\Bookings;
use yii\db\Expression;

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
        $query = Bookings::find()
            ->select([
                'DATE_FORMAT(FROM_UNIXTIME(created_at), "%Y-%m") AS date',
                'COUNT(*) AS booking_count',
            ])
            ->groupBy('date')
            ->orderBy('date');

        $result = $query->asArray()->all();

        $labels = [];
        $data = [];

        foreach ($result as $row) {
            $index = array_search($row['date'], $labels);

            if ($index !== false) {
                // Label already exists, add up the count
                $data[$index] += $row['booking_count'];
            } else {
                // Add new label and count
                $labels[] = $row['date'];
                $data[] = $row['booking_count'];
            }
        }

        // Query to find the most frequent languages spoken
        $mostFrequentLanguages = Bookings::find()
        ->select('languages_spoken')
        ->groupBy('languages_spoken')
        ->orderBy(['COUNT(*)' => SORT_DESC])
        ->limit(1)
        ->scalar();

        // Query to find the most frequent gender
        $mostFrequentGender = Bookings::find()
        ->select('gender')
        ->groupBy('gender')
        ->orderBy(['COUNT(*)' => SORT_DESC])
        ->limit(1)
        ->scalar();

        // Query to find the most frequent babysitter age range
        $mostFrequentAgeRange = Bookings::find()
        ->select('babysitter_age_range')
        ->groupBy('babysitter_age_range')
        ->orderBy(['COUNT(*)' => SORT_DESC])
        ->limit(1)
        ->scalar();

        return $this->render('index',['userProfileImage' => $userProfileImage,
         'babysitters' => $babysitters,'parents' => $parents,
        'bookings' => $bookings,'mostFrequentAgeRange' => $mostFrequentAgeRange,
         'mostFrequentGender' => $mostFrequentGender, 'mostFrequentLanguages' => $mostFrequentLanguages,
         'labels' => $labels, 'data' => $data]);
    }

}
