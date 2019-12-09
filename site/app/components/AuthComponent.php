<?php


namespace app\components;


use app\base\BaseComponent;
use app\models\Users;

class AuthComponent extends BaseComponent
{
    public function signUp(Users $model): bool
    {
        $model->setScenarioSignUp();
        if (!$model->validate(['userName', 'login', 'password', 'email'])) {
            return false;
        }
        $model->passwordHash = $this->genHashPassword($model->getPassword());

        if ($model->save()) {
            //назначаем права пользователям
            //\Yii::$app->rbac->generateRbac();
            \Yii::$app->rbac->getRbacNewUser($model);
            return true;
        }
        return false;
    }

    public function signIn(Users $model): bool
    {
        $model->setScenarioSignIn();
        if (!$model->validate(['login', 'password'])) {
            return false;
        }
        $user = $this->getUserByLogin($model->login);
        if (!$this->validatePassword($model->getPassword(), $user->passwordHash)) {
            $model->addError('password', 'Неверный пароль');
            return false;
        }
        return \Yii::$app->user->login($user);
    }

    private function validatePassword($password, $passwordHash): bool
    {
        if (\Yii::$app->security->validatePassword($password, $passwordHash)) {
            return true;
        }
        return false;
    }

    private function getUserByLogin($login): ?Users
    {
        return Users::find()->andWhere(['login' => $login])->one();
    }


    private function genHashPassword(string $password)
    {
        return \Yii::$app->security->generatePasswordHash($password, 13);
    }
}