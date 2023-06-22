<?php

namespace app\controllers;
use app\models\User;
use app\models\LanguagesBabysitter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use Yii;

class ProfileController extends \yii\web\Controller
{
   

    public function actionUsername()
    {
        $userId = Yii::$app->user->id;
        $newUsername = Yii::$app->request->post('new_username');

        $rowsAffected = Yii::$app->db->createCommand()
            ->update('user', ['username' => $newUsername], ['id' => $userId])
            ->execute();

        return $this->redirect('user/index');
    }

    public function actionPassword()
    {
        $userId = Yii::$app->user->id;
        $currentPassword = Yii::$app->request->post('current_password');
        $newPassword = Yii::$app->request->post('new_password');
        $confirmPassword = Yii::$app->request->post('confirm_password');

        $model = User::findOne($userId); // Assuming your User model is named "User"

        if (!$model) {
            throw new NotFoundHttpException('User not found.');
        }

        // Verify that the current password matches the user's actual password
        if (!$model->validatePassword($currentPassword)) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        // Validate the new password and confirm password fields
        if ($newPassword !== $confirmPassword) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        // Generate a new password hash
        $newPasswordHash = Yii::$app->security->generatePasswordHash($newPassword);

        // Update the password_hash attribute in the user table
        $rowsAffected = Yii::$app->db->createCommand()
            ->update('user', ['password_hash' => $newPasswordHash], ['id' => $userId])
            ->execute();


        return $this->redirect('user/index');
    }

    public function actionBio()
    {
        if (Yii::$app->request->isPost) {
            $birthdate = Yii::$app->request->post('birthdate');
            $selectedLanguages = Yii::$app->request->post('languages', []);
            
            $userId = Yii::$app->user->id; 
            $user = User::findOne($userId);
            
            if ($user->birthdate != $birthdate) {
                $user->birthdate = $birthdate;
                $rowsAffected = Yii::$app->db->createCommand()
                ->update('user', ['birthdate' => $birthdate], ['id' => $userId])
                ->execute();

            }
            
            $babysitterId = $userId;
            
            foreach ($selectedLanguages as $languageId) {
                $model = new LanguagesBabysitter();
                $model->language_id = $languageId;
                $model->babysitter_id = $babysitterId;
                $model->save();
            }
            
            
        }
        
        return $this->redirect('user/index');
    }


}
