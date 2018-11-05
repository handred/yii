<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\Book */


if($errors = $model->getErrors()){
    print_r($errors);
}
?>

<div class="form">
    <h3>Добавить книгу</h3>
    <?php
    $form = ActiveForm::begin(['action'=>['book/create'], 'options' => ['enctype' => 'multipart/form-data', 'method' => 'post']]);
    echo $form->field($model, 'fio')->label('ФИО автора');
    echo $form->field($model, 'name')->label('Название книги');
    echo $form->field($model, 'year')->label(' Год издания');
    echo $form->field($model, 'photo')->fileInput()->label('Обложка');
    echo $form->field($model, 'onbase')->checkbox(['label' => 'В наличии']);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
