<?php
/**
 * @var \app\models\Calendar
 * @var \app\controllers\actions\calendar\CreateCalendar
 */
?>
<div class="col-md-4">
    <?=\yii\bootstrap\Html::tag('h4',\yii\helpers\Html::encode($calendar->year).' год '.\app\models\Calendar::MONTH[$calendar->month-1].' месяц');?>
    <?= \yii\bootstrap\Html::beginTag('table', ['class' => 'table']); ?>
    <?= \yii\bootstrap\Html::beginTag('tr'); ?>
    <?php for ($i = 0; $i < count(\app\models\Calendar::WEEK); $i++): ?>
        <?= \yii\bootstrap\Html::tag('th', \yii\helpers\Html::encode(\app\models\Calendar::WEEK[$i])) ?>
    <?php endfor ?>
    <?= \yii\bootstrap\Html::endTag('tr'); ?>
    <?= \yii\bootstrap\Html::beginTag('tr'); ?>
    <?php for ($i = 0; $i < $calendar->runDay(); $i++): ?>
        <?= \yii\bootstrap\Html::tag('td', ' ') ?>
        <?php $calendar->dayInThisWeek++ ?>
    <?php endfor ?>
    <?php for ($dayOfMonth = 1;$dayOfMonth <= $calendar->daysInMonth();$dayOfMonth++): ?>
        <?= \yii\bootstrap\Html::beginTag('td'); ?>
        <div><?=\yii\bootstrap\Html::a($dayOfMonth,['../day/index','year'=>$calendar->year, 'month'=>$calendar->month,'dayOfMonth'=>$dayOfMonth])?></div>
        <?= \yii\bootstrap\Html::endTag('td'); ?>
        <?php $calendar->dayInThisWeek++ ?>
        <?php if ($calendar->dayInThisWeek == 8): ?>
            <?= \yii\bootstrap\Html::endTag('tr'); ?>
            <?php $calendar->dayInThisWeek = 1 ?>
            <?php if ($dayOfMonth < $calendar->daysInMonth()): ?>
                <?= \yii\bootstrap\Html::beginTag('tr'); ?>
            <?php endif;?>
        <?php endif;?>
    <?php endfor ?>


    <?= \yii\bootstrap\Html::endTag('table'); ?>

</div>



