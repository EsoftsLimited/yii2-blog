<?php

namespace esoftslimited\blog\assets;

use yii\web\AssetBundle;

/**
 * This declares the asset files required by Blog.
 *
 * @author Zabolotskikh Boris <zabolotskich@bk.ru>
 */
class BlogAsset extends AssetBundle
{
    public $sourcePath = '@vendor/esoftslimited/yii2-blog/assets/source';
    public $css = ['css/main.css'];
    public $depends = ['yii\bootstrap\BootstrapAsset'];
}
