<?php
/*
 * @var $model \app\model\ActivitySearch
 * @var $provider \yii\data\ActiveDataProvider
 */
?>

<div class="row">
    <div class="col-md-12">
        <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'tableOptions' => [
                'class' => 'table'
            ],
            'filterModel' => $model,
            'columns' => [
                [
                    'attribute' => 'title',
                    'label' => 'Название',
                    // 'header' => 'afvsdaucbaSUID',
                    'value' => function ($model) {
                        return \yii\helpers\Html::a(\yii\helpers\Html::encode($model->title), ['/activity/view', 'id' => $model->id]);
                    },
                    'format' => 'raw'
                ],
                [
                    'attribute' => 'author.login'
                ],
                'date',
                'id_author',
                'description',
                ['attribute' => 'createDate',
                    'value' => function ($model) {
                        return $model->getDateCreated();
                    }],
                'createDate',
                ['class' => yii\grid\CheckboxColumn::class],

            ],
            'rowOptions' => function ($model, $key, $index, $grid) {
                $class = ($index % 2) ? 'odd' : 'even';
                return ['key' => $key, 'class' => $class, 'index' => $index];
            }
        ]); ?>
    </div>
</div>
<div class="row">

</div>
