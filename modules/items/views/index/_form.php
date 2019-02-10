<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\pages\models\Pages;

/* @var $this yii\web\View */
/* @var $model app\modules\items\models\Items */
/* @var $form yii\widgets\ActiveForm */


$items = ArrayHelper::map(Pages::find()->all(),'id','title');
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'page_id')->dropDownList($items, ['prompt'=>'Выберите раздел']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
