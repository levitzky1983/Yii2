<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearchCrud */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if($this->beginCache('activityIndexCrud',['duration'=>10])):?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_author',
            [
                'attribute' => 'author.login',
                'header' => 'Логин'
            ],
            'title',
            'description:ntext',
            'date',
            [
                'attribute' => 'author.userName',
                'label' => 'Имя пользователя'
            ],
            //'timeBegin',
            //'timeEnd',
            //'isBlocked',
            //'isRepeat',
            //'repeatType',
            //'email:email',
            //'createDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php $this->endCache(); endif;?>
</div>
