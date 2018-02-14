<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Изменить имя пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index" style="overflow: auto !important;">

    <h1><?= Html::encode('Редактирование пользователя') ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'ID',
                'headerOptions' => ['width' => '50'],
                'content'=>function($data){
                    return $data->id;
                }
            ],

            [
                'attribute'=>'name',
                'headerOptions' => ['width' => '50'],
                'content'=>function($data){
                    return $data->name;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '<div style="text-align: center">{update}</div>',
                'buttons' => [
                    'update' => function ($url) {
                        return '<a href="'.$url.'" style="padding-left: 6px; padding-right: 6px;"><span class="glyphicon glyphicon-pencil"></span></a>';
                    },
                ],
            ],
        ],
    ]); ?>
</div>
<style type="text/css">
    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left:0;
        padding-right:0;
        height:auto;
        margin-top:0px !important;
    }
</style>