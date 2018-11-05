<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

if ($user->id) {
    echo $item->onbase ? 'В наличии' : 'Нет в наличии';
    return;
}

Pjax::begin([
        // Опции Pjax
]);
$form = ActiveForm::begin([
            'options' => ['data' => ['pjax' => true]],
                // остальные опции ActiveForm
        ]);

echo $form->field($item, 'onbase')->checkbox(['label' => 'В наличии']);

ActiveForm::end();
Pjax::end();