<?php

/**
 * @var yii\web\View $this
 * @var biz\inventory\models\TransferNotice $model
 */
$this->title = 'Update Transfer Notice: ' . ' ' . $model->idTransfer->transfer_num;
$this->params['breadcrumbs'][] = ['label' => 'Transfer Notices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTransfer->transfer_num, 'url' => ['view', 'id' => $model->id_transfer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transfer-notice-update">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
