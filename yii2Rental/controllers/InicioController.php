<?php


namespace app\controllers;

use yii\web\Controller;

class InicioController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionSum()
    {
        echo 'Yesis!';
    }
}