<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var biz\purchase\models\PurchaseHdr $model
 */
$this->title = 'Create Transfer';
$this->params['breadcrumbs'][] = ['label' => 'Transfer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-hdr-create">
    <?php
    echo $this->render('_form', [
        'model' => $model,
        'details' => $details,
        'masters' => $masters
    ]);
    ?>

</div>
