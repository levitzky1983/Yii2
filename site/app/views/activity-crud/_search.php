<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActivitySearchCrud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_author') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'timeBegin') ?>

    <?php // echo $form->field($model, 'timeEnd') ?>

    <?php // echo $form->field($model, 'isBlocked') ?>

    <?php // echo $form->field($model, 'isRepeat') ?>

    <?php // echo $form->field($model, 'repeatType') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'createDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
