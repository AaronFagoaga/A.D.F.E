<?php

use app\models\Tasks;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TaskSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        //'dataProvider' => $dataProvider, //Método 1
        //'dataProvider' => $grid, //Método 2
        'dataProvider' => $taskDP,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_task',
            'code',
            'name',
            //'description:ntext',
            'status',
            //'created_by',
            'created_at' => [
                'attribute' => 'created_at',
                'filter' => false,
                'format' => ['date', 'php:d/m/y']
            ],
            //'updatedted_by',
            //'updatedted_at',
            /*  --Para el método 1 y 2 
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Tasks $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_task' => $model->id_task]);
                 }
            ],
            */

            [
                'class' => ActionColumn::class,  //PARA EL MÉTODO 3
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_task' => $model['id_task']]);
                 }
            ],
        ],
    ]); ?>

<?php
    dump($taskDP->getModels())
?>

</div>
