<?php

namespace esoftslimited\blog\assets;

use yii\web\AssetBundle;

/**
 * This declares the asset files required by translit script.
 *
 * @author Zabolotskikh Boris <zabolotskich@bk.ru>
 */
class TranslitAsset extends AssetBundle
{
    public $sourcePath = '@vendor/esoftslimited/yii2-blog/assets/source/js';
    public $js = ['translit.js'];
    public $depends = ['yii\web\JqueryAsset'];
}
