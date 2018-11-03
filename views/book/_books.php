<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
?>
<div class="books">

    <?php
    foreach ($books as $item) {
        $item->photo = '<a target="_blank" href="/uploads/'.$item->photo.'"><img width="80" src="/uploads/'.$item->photo.'"/></a>';
        ?>
    <div class="item">
        <div class="fio"><?=$item->fio?></div>
        <div class="name"><?=$item->name?></div>
        <div class="year"><?=$item->year?></div>
        <div class="photo"><?=$item->photo?></div>
        <div class="onbase"><?=$item->onbase?></div>
    </div>
    <?php
    }
    ?>

</div>
