<?php

namespace app\controllers;

use app\models\PasswordChangeForm;
use app\models\ProfileChangeForm;
use app\models\User;
use Yii;
use yii\web\Controller;

class ProfileController extends Controller
{
    public function actionProfile()
    {
        $model = User::findOne(Yii::$app->user->identity->getId());
        $tournaments = $model->tournaments;

        return $this->render('profile', [
            "model" => $model,
            "tournaments" => $tournaments,
        ]);
    }

    public function actionUpdate()
    {
        $user = User::findOne(Yii::$app->user->id);
        $model = new ProfileChangeForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->update($user)) {
                Yii::$app->session->setFlash('success', 'Email успешно изменён');
                return $this->redirect(['profile']);
            }
        }

        $model->email = $user->email;
        return $this->render('update', [
            'model' => $model,
            'user' => $user
        ]);
    }

    public function actionPassword()
    {
        $user = User::findOne(Yii::$app->user->identity->getId());
        $model = new PasswordChangeForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $user->validatePassword($model->oldPassword)) {
                if ($model->changePassword()) {
                    Yii::$app->session->setFlash('success', 'Пароль успешно изменен');
                    return $this->redirect(['profile']);
                }
            }
        }

        return $this->render('password', ['model' => $model]);
    }
}