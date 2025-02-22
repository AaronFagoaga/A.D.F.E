<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;

class CalculatorController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCalculate()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        $request = Yii::$app->request;
        $num1 = (float) $request->post('num1');
        $num2 = (float) $request->post('num2');
        $operation = $request->post('operation');
    
        $result = null;
    
        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                $result = $num2 != 0 ? $num1 / $num2 : 'Error: No se puede dividir entre cero';
                break;
            default:
                $result = 'Operación unválida';
        }
    
        return ['result' => $result];
    }
}
