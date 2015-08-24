<?php

namespace esoftslimited\blog\assets;

use yii\web\AssetBundle;

/**
 * This declares the asset files required by duplicate script.
 *
 * @author Zabolotskikh Boris <zabolotskich@bk.ru>
 */
class DuplicateAsset extends AssetBundle
{
    public $sourcePath = '@vendor/esoftslimited/yii2-blog/assets/source/js';
    public $js = ['duplicate.js'];
    public $depends = ['yii\web\JqueryAsset'];
}
