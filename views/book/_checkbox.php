<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;


if (!$user->id) {
    echo $item->onbase ? 'В наличии' : 'Нет в наличии';
    return;
}


Pjax::begin(['id'=>'pjax' . $item->id]);
$form = ActiveForm::begin([
            'action' => ['book/checkbox'],
            'id' => 'checkbox-form_' . $item->id,
            'options' => [
                'data-pjax' => true,
            ]
        ]);
echo $form->field($item, 'onbase')->checkbox(['label' => 'В наличии', 'onchange'=>'$(this.form).trigger("submit")']);
echo Html::hiddenInput('id', $item->id);
ActiveForm::end();
Pjax::end();