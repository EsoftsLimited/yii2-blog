<?php

use esoftslimited\blog\Module;
use esoftslimited\blog\assets\TranslitAsset;

/* @var $this yii\web\View */
/* @var $model esoftslimited\blog\models\Category */

$this->title = Module::t('main', 'New category');
$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Blog'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

if ($this->context->module->autoTranslit) {
    TranslitAsset::register($this);
}
?>
<div class="category-create">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
