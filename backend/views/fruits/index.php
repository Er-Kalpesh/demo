<?php

use common\models\Fruits;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\FruitsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fruits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fruits-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fruits', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Favorite Fruits', ['favorite'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'ext_id',
            'family',
            'fruit_order',
            //'genus',
            //'nutritions:ntext',
            //'created_at',
            //'updated_at',
            [
                'format' => 'raw',
                'attribute' => 'is_favorite',
                'value'=>function($model){
                    if(empty($model->is_favorite)){
                        return Html::a("Add to favorite", ['/fruits/add-favorite', 'id' => $model->id]); 
                    }else{
                        return "Added";
                    }   
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fruits $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
