<?php
/**
 * @var \app\models\Calendar
 */
?>
<h1><?= $day->titleDay ?> <?php if ($day->isWeekend): ?> Выходной день<?php else: ?>Рабочий день<?php endif; ?></h1>
<h3>Дата <?= $day->date ?></h3>
<?php if ($day->compareDayToDate()): ?>
    <h3>Дата уже прошла</h3>
<?php else: ?>
<h3><?=\yii\bootstrap\Html::a('Создать событие',['../activity/create?date='.$day->date],['class'=>'btn btn-default']);?></h3>
<?php endif;?>
<!--<h3>Время <? //=$day->time?></h3>-->
<h2><?= $day->activity ?></h2>

<?= \yii\bootstrap\Html::a('Вернуться к календарю', ['../calendar/createCalendar'], ['class' => 'btn btn-default']); ?>






