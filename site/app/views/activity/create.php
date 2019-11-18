<?php
/**
 * @var $model \app\models\Activity
 */
?>

<h1>Создание активности</h1>
<div class="row">
    <div class="col-md-4">
        <?php $form = \yii\bootstrap\ActiveForm::begin(); ?>
        <?= $form->field($model, 'title'); ?>
        <?= $form->field($model, 'author'); ?>
        <?= $form->field($model, 'description')->textarea(); ?>
        <?= $form->field($model, 'date', ['enableClientValidation' => false, 'enableAjaxValidation' => true])->textInput(['value'=>$model->date,'placeholder'=>'Формат даты y-m-d или d.m.y']); ?>
        <?= $form->field($model, 'timeBegin')->textInput(['placeholder'=>'Формат времени 00:00']); ?>
        <?= $form->field($model, 'timeEnd')->textInput(['placeholder'=>'Формат времени 00:00']); ?>
        <?= $form->field($model, 'isBlocked')->checkbox(); ?>
        <?= $form->field($model, 'isRepeat')->checkbox(); ?>

        <?= $form->field($model, 'repeatType')->dropDownList($model::REPEAT_TYPE); ?>

        <?= $form->field($model, 'useNotification')->checkbox(); ?>
        <?= $form->field($model, 'email', ['enableClientValidation' => false, 'enableAjaxValidation' => true]); ?>
        <?= $form->field($model, 'file')->fileInput();?>
        <button type="submit" class="btn-default">Save</button>
        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>


</div>

<p><?=print_r($record);?></p>
