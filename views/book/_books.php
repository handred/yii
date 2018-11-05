<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $books app\models\Book */
?>
<div class="books block">
    <?php
    foreach ($books as $item) {
        ?>
        <div class="item row">
            <div class="fio"><?= $item->fio ?></div>
            <div class="name"><?= $item->name ?></div>
            <div class="year"><?= $item->year ?></div>
            <div class="photo">
                <?=$this->render('_photo', ['photo' => $item->getimage()]);?>
            </div>
            
            <div class="onbase">
                <?=$this->render('_checkbox', ['item' => $item, 'user' => $user]);?>
            </div>
        </div>
        <?php
    }
    ?>

</div>
