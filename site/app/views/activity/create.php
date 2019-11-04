<?php
?>

<h1>Создание активности</h1>
<div class="row">
    <div class="col-md-4">
        <?php $form = \yii\bootstrap\ActiveForm::begin();?>
            <?=$form->field($model,'title');?>
            <?=$form->field($model,'author');?>
            <?=$form->field($model,'description')->textarea();?>
            <?=$form->field($model,'date')->input('date');?>
            <?=$form->field($model,'time')->input('time');?>
            <?=$form->field($model,'isBlocked')->checkbox();?>
            <?=$form->field($model,'isRepeat')->checkbox();?>

            <button type="submit" class="btn-default">Save</button>
        <?php \yii\bootstrap\ActiveForm::end();?>
        <?=$model->title?>
    </div>
</div>
