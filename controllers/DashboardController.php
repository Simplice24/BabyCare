<?php

namespace app\controllers;
use yii\filters\AccessControl;
use app\models\User;
use app\models\Bookings;
use yii\db\Expression;
use yii\db\Query;
use Yii;

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

        //Percentage calculation
        // Get the current year
        $currentYear = date('Y');

        // Get the previous year
        $previousYear = $currentYear - 1;

        // Calculate the start and end timestamps for the previous year
        $previousYearStart = strtotime($previousYear . '-01-01 00:00:00');
        $previousYearEnd = strtotime($previousYear . '-12-31 23:59:59');

        // Calculate the start and end timestamps for the current year
        $currentYearStart = strtotime($currentYear . '-01-01 00:00:00');
        $currentYearEnd = strtotime($currentYear . '-12-31 23:59:59');

        // Query the database to count the number of babysitters created in the previous year
        $BabySitterspreviousYearCount = (new Query())
        ->select('COUNT(*)')
        ->from('user')
        ->where([
            'and',
            ['between', 'created_at', $previousYearStart, $previousYearEnd],
            ['role' => 'Babysitter']
        ])
        ->scalar();

        // Query the database to count the number of babysitters created in the current year
        $BabySitterscurrentYearCount = (new Query())
        ->select('COUNT(*)')
        ->from('user')
        ->where([
            'and',
            ['between', 'created_at', $currentYearStart, $currentYearEnd],
            ['role' => 'Babysitter']
        ])
        ->scalar();

        // Calculate the percentage increase if the previous year's count is not zero
        if ($BabySitterspreviousYearCount !== 0) {
            // Calculate the percentage increase
            $BabySitterspercentageIncrease = (($BabySitterscurrentYearCount - $BabySitterspreviousYearCount) / $BabySitterspreviousYearCount) * 100;

        } else {
            // Handle the division by zero error
            $BabySitterspercentageIncrease = 100;
        }

        // Query the database to count the number of parents created in the previous year
        $ParentspreviousYearCount = (new Query())
        ->select('COUNT(*)')
        ->from('user')
        ->where([
            'and',
            ['between', 'created_at', $previousYearStart, $previousYearEnd],
            ['role' => 'Parent']
        ])
        ->scalar();

        // Query the database to count the number of babysitters created in the current year
        $ParentscurrentYearCount = (new Query())
        ->select('COUNT(*)')
        ->from('user')
        ->where([
            'and',
            ['between', 'created_at', $currentYearStart, $currentYearEnd],
            ['role' => 'Parent']
        ])
        ->scalar();

        // Calculate the percentage increase if the previous year's count is not zero
        if ($ParentspreviousYearCount !== 0) {
            // Calculate the percentage increase
            $ParentspercentageIncrease = (($ParentscurrentYearCount - $ParentspreviousYearCount) / $ParentspreviousYearCount) * 100;

        } else {
            // Handle the division by zero error
            $ParentspercentageIncrease = 100;
        }

        $currentYearStart = strtotime('first day of January');
        $currentYearEnd = strtotime('last day of December');

        // Get the previous year start and end timestamps
        $previousYearStart = strtotime('-1 year', $currentYearStart);
        $previousYearEnd = strtotime('-1 year', $currentYearEnd);

        // Query the database to count the number of bookings in the previous year
        $previousYearCount = (new Query())
            ->from('bookings')
            ->where(['between', 'created_at', $previousYearStart, $previousYearEnd])
            ->count();

        // Query the database to count the number of bookings in the current year
        $currentYearCount = (new Query())
            ->from('bookings')
            ->where(['between', 'created_at', $currentYearStart, $currentYearEnd])
            ->count();

        // Calculate the percentage increase
        if ($previousYearCount == 0 && $currentYearCount > 0) {
            $bookingsPercentageIncrease = 100; // Set to 100% if previous year count is zero
        } elseif ($previousYearCount > 0) {
            $bookingsPercentageIncrease = (($currentYearCount - $previousYearCount) / $previousYearCount) * 100;
        } else {
            $bookingsPercentageIncrease = 0; // Set to 0% if both previous and current year counts are zero
        }

        

        
        return $this->render('index',['userProfileImage' => $userProfileImage,
         'babysitters' => $babysitters,'parents' => $parents,
        'bookings' => $bookings,'mostFrequentAgeRange' => $mostFrequentAgeRange,
         'mostFrequentGender' => $mostFrequentGender, 'mostFrequentLanguages' => $mostFrequentLanguages,
         'labels' => $labels, 'data' => $data,'BabySitterspercentageIncrease' => $BabySitterspercentageIncrease,
        'ParentspercentageIncrease' => $ParentspercentageIncrease, 'bookingsPercentageIncrease' => $bookingsPercentageIncrease]);
    }

}
