<?php
/**
 * @var \app\models\Calendar
 */
?>
<h1><?= $day->titleDay; ?>
    <?= ($day->isWeekend) ? 'Выходной день' : 'Рабочий день' ?></h1>
<h3>Дата <?= $day->date ?></h3>
<h3><?= date('Y.m.d'); ?></h3>
<?php if ($day->isPast): ?>
    <h3>Дата уже прошла</h3>
<?php else: ?>
    <h3><?= \yii\bootstrap\Html::a('Создать событие', ['../activity/create?date=' . $day->date], ['class' => 'btn btn-default']); ?></h3>
<?php endif; ?>
<?php if (!$day->activity): ?>
    <h2>Событий не запланировано</h2>

<?php else: ?>
    <h2><?= \yii\bootstrap\Html::a('Запланированные события', ['../activity/index?date='.$day->date], ['class' => 'btn btn-default']); ?> </h2>
<?php endif ?>
<?= \yii\bootstrap\Html::a('Вернуться к календарю', ['../calendar/createCalendar'], ['class' => 'btn btn-default']); ?>

<div class="row">
    <?php //print_r(\Yii::$app->request->getQueryParams());?>
</div>



