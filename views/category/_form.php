<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use pendalf89\blog\Module;
use pendalf89\blog\models\Category;
use pendalf89\filemanager\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model pendalf89\blog\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">
    <div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-9 panel-default post-form ">
    <div class="panel panel-default">
    <div class="panel-body">
    <?= $form->field($model, 'title')->textInput(['maxlength' => 255, 'class' => 'form-control translit-input']) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(Category::getList($model->id),
        ['prompt' => Module::t('main', 'Select parent category')]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => 255, 'class' => 'form-control translit-output']) ?>

    <?= $form->field($model, 'position')
        ->textInput()
        ->hint(Module::t('main', 'Number of position on sorting. The higher the number, the higher category is to issue.')) ?>
    </div>
    </div>
   </div>
   <div class="col-md-3 panel-default">
   <div class="panel panel-default">
    <div class="panel-body"> 
    <div id="thumbnail-container" class="thumbnail"><?= $model->getThumbnailImage('medium') ?></div>
    <?= $form->field($model, 'thumbnail')->widget(FileInput::className(), [
                        'thumb' => 'medium',
                        'template' => '<div class="input-group"><span class="hidden">{input}</span><span class="btn-group">{button}{reset-button}</span></div>',
                        'pasteData' => FileInput::DATA_ID,
                        'buttonName' => Module::t('main', 'Set thumbnail'),
                        'imageContainer' => '#thumbnail-container',
                    ]) ?>
     <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('main', 'Add Category')
            : Module::t('main', 'Update Category'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
     </div>
    </div><!--end panel body-->
    </div><!--end panel-->
    </div>
    <?php ActiveForm::end(); ?>
  </div>
</div>
