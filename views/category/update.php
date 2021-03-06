<?php

use yii\helpers\Html;
use esoftslimited\blog\Module;

/* @var $this yii\web\View */
/* @var $model esoftslimited\blog\models\Category */

$this->title = Module::t('main', 'Update category “{title}”', ['title' => $model->title]);
$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Blog'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('main', 'Update category');
?>
<div class="category-update">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
