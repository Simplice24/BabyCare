<?php

namespace app\controllers;
use app\models\User;
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

    return $this->redirect(Yii::$app->request->referrer);
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


}
