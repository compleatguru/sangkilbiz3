<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var biz\models\User2Branch $model
 */

$this->title = 'Update User2 Branch: ' . ' ' . $model->id_branch;
$this->params['breadcrumbs'][] = ['label' => 'User2 Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_branch, 'url' => ['view', 'id_branch' => $model->id_branch, 'id_user' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user2-branch-update col-lg-6">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
