<?php


namespace app\components;


use app\base\BaseComponent;
use app\models\rules\OwnerActivityRule;

class RbacComponent extends BaseComponent
{
    private function getManager()
    {
        return \Yii::$app->authManager;
    }

    public function generateRbac(){
        $manager = $this->getManager();
        $manager->removeAll();

        $admin = $manager->createRole('admin');
        $user = $manager->createRole('user');

        $manager->add($admin);
        $manager->add($user);

        $createActivity = $manager->createPermission('createActivity');
        $createActivity->description='Создание активности';
        $manager->add($createActivity);

        $ruleViewOwnerActivity = new OwnerActivityRule();
        $manager->add($ruleViewOwnerActivity);

        $viewOwnerActivity = $manager->createPermission('viewOwnerActivity');
        $viewOwnerActivity->description='Просмотр своей активности';
        $viewOwnerActivity->ruleName = $ruleViewOwnerActivity->name;
        $manager->add($viewOwnerActivity);

        $adminActivity = $manager->createPermission('adminActivity');
        $adminActivity->description='Админ активности';
        $manager->add($adminActivity);

        $manager->addChild($user,$createActivity);
        $manager->addChild($user,$viewOwnerActivity);
        $manager->addChild($admin,$user);
        $manager->addChild($admin,$adminActivity);

        $manager->assign($admin,1);
        $manager->assign($user,2);

    }

    public function canCreateActivity():bool{
        return \Yii::$app->user->can('createActivity');
    }

    public function canViewActivity($activity):bool{
        if(\Yii::$app->user->can('adminActivity')){
            return true;
        }
        if(\Yii::$app->user->can('viewOwnerActivity',['activity'=>$activity])){
            return true;
        }
        return false;
    }
}