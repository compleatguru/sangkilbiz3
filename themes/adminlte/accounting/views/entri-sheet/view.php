<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use biz\models\EntriSheet;

/**
 * @var yii\web\View $this
 * @var EntriSheet $model
 */
$this->title = $model->cd_esheet;
$this->params['breadcrumbs'][] = ['label' => 'Entri Sheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .tab-content {
        border: 1px #e0e0e0 solid;
        border-top: none;
        padding: 20px;
    }
</style>
<div class="entri-sheet-view col-lg-4" style="padding-left: 0px;">
    <div class="box box-danger">
        <div class="box-body no-padding">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id_esheet',
                    'cd_esheet',
                    'nm_esheet',
                    'create_date',
                    'create_by',
                    'update_date',
                    'update_by',
                ],
            ])
            ?>
        </div>
        <div class="box-footer">
            <?= Html::a('Update', ['update', 'id' => $model->id_esheet], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->id_esheet], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>
</div>
<!-- Tab panes -->
<div class="col-lg-8">
    <div class="box box-info">
        <div class="box-header">
            <i class="fa fa-cogs"></i>
            <h3 class="box-title">Detail Account</h3>
        </div>
        <div class="box-body no-padding">
            <?php
//            echo '<a class=" pull-right" data-toggle="modal" data-target="#myModal"><span class="btn btn-default glyphicon glyphicon-plus"></span></a>';
            $dESheetD = new ActiveDataProvider([
                'query' => $model->getEntriSheetDtls(),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            echo GridView::widget([
                'dataProvider' => $dESheetD,
                'tableOptions' => ['class' => 'table table-striped'],
                'layout' => '{items}',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'nm_esheet_dtl',
                    //'idCoa.cd_account',
                    'idCoa.nm_account',
                    'idCoa.normal_balance',
                ],
            ]);
            ?>
        </div>
    </div>
</div>
