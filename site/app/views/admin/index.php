<?php


use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

?>
<h4>ADMIN MENU</h4>

<?= Nav::widget([
    'options' => ['class' => 'nav nav-tabs'],
    'items' => [
        ['label' => 'Календарь', 'url' => ['/calendar/createCalendar']],
        ['label' => 'Редактирование',
            'items' => [
                ['label' => 'Активности','url'=>['/activity-crud/']],
                ['label' => 'Пользователи', 'url' => ['/users-crud/']]
            ]
        ],

    ]]);

?>

