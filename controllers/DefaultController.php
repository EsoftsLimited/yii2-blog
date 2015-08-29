<?php

namespace esoftslimited\blog\controllers;

use esoftslimited\blog\models\Post;
use Yii;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
