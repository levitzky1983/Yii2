<?php


/* @var $this \yii\web\View */
/* @var $model \app\models\Users */
?>

<div class="row">
    <div class="col-md-6">
        <h3>Авторизация</h3>
        <?php $form = yii\bootstrap\ActiveForm::begin() ?>

        <?=$form->field($model, 'login'); ?>
        <?=$form->field($model, 'password')->passwordInput(); ?>

        <div class="form-group">
            <button type="submit" class="btn btn-dark">Авторизация</button>
        </div>

        <?php \yii\bootstrap\ActiveForm::end() ?>
    </div>
</div>
