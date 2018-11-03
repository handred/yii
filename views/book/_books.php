<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
?>
<div class="books">
    <?php
    foreach ($books as $item) {
        ?>
    <div class="item row">
        <div class="fio"><?=$item->fio?></div>
        <div class="name"><?=$item->name?></div>
        <div class="year"><?=$item->year?></div>
        <div class="photo"><?=$item->getimage()?></div>
        <div class="onbase"><?=$item->onbase?></div>
    </div>
    <?php
    }
    ?>

</div>
