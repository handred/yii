<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form">
    <h3>Добавить книгу</h3>
    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'fio');
    echo $form->field($model, 'name');
    echo $form->field($model, 'year');
    echo $form->field($model, 'photo')->fileInput();
    echo $form->field($model, 'onbase')->checkbox();
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
