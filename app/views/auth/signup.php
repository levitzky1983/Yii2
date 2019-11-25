<?php


/* @var $this \yii\web\View */
/* @var $model \app\models\Users */
?>

<div class="row">
    <div class="col-md-6">
        <h3>Регистрация</h3>
        <?php $form = yii\bootstrap\ActiveForm::begin() ?>
        <?=$form->field($model, 'userName'); ?>
        <?=$form->field($model, 'login'); ?>
        <?=$form->field($model, 'password')->passwordInput(); ?>
        <?= $form->field($model, 'email');?>
        <div class="form-group">
            <button type="submit" class="btn btn-dark">Регистрация</button>
        </div>

        <?php \yii\bootstrap\ActiveForm::end() ?>
    </div>
</div>
