<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use esoftslimited\blog\helpers\Helper;
use esoftslimited\blog\Module;

/* @var $this yii\web\View */
/* @var $model esoftslimited\blog\models\Type */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'show_category')->dropDownList(Helper::booleanChoiceArray()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('main', 'Create')
            : Module::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
