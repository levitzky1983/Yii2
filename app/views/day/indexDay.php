<?php
?>
<h1>Сегодня <?=$day->titleDay?> <?php if($day->isWeekend):?> выходной день<?php else:?>рабочий день<?php endif;?></h1>
<h3>Дата <?=$day->date?></h3>
<!--<h3>Время <?//=$day->time?></h3>-->
<h2><?=$day->activity?></h2>

<?=\yii\bootstrap\Html::a('Вернуться к календарю', ['../calendar/createCalendar'],['class'=>'btn btn-default']);?>






