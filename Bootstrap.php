<?php

/*
 * This file is part of the Esofts project.
 * 
 **/

namespace esoftslimited\blog;

use yii\authclient\Collection;
use yii\base\BootstrapInterface;
use yii\base\InvalidConfigException;
use yii\i18n\PhpMessageSource;
use yii\web\GroupUrlRule;
use yii\console\Application as ConsoleApplication;
use yii\web\User;

/**
 * Bootstrap class registers module and user application component. It also creates some url rules which will be applied
 * when UrlManager.enablePrettyUrl is enabled.
 *
 * @author Elijah Mwangi <emwangi.g@gmail.com>
 */
class Bootstrap implements BootstrapInterface
{
    /** @var array Model's map */
    private $_modelMap = [
        'Category'=> 'esoftslimited\blog\models\Category',
        'CategorySearch'=>'esoftslimited\blog\models\CategorySearch','CategorySearch'=>'esoftslimited\blog\models\CategorySearch',
        'Post'=>'esoftslimited\blog\models\Post',
        'PostQuery'=>'esoftslimited\blog\models\PostQuery',
        'PostSearch'=>'esoftslimited\blog\models\PostSearch',
        'Type'=>'esoftslimited\blog\models\Type',
        'TypeSearch'=>'esoftslimited\blog\models\TypeSearch',


        
    ];

    /** @inheritdoc */
    public function bootstrap($app)
    {
        exit('sawa');
      /** @var $module Module */
        if ($app->hasModule('blog') && ($module = $app->getModule('blog')) instanceof Module) {
          $this->_modelMap = array_merge($this->_modelMap, $module->modelMap);
          foreach ($this->_modelMap as $name => $definition) {
                $class = "esofts\\blog\\models\\" . $name;
                \Yii::$container->set($class, $definition);
                $modelName = is_array($definition) ? $definition['class'] : $definition;
                $module->modelMap[$name] = $modelName;
                
            }
        }
    }
}