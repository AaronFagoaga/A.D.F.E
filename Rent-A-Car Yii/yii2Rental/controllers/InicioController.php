<?php


namespace app\controllers;

use yii\web\Controller;
use app\models\InicioModel;
use DateTime;

class InicioController extends Controller
{
    public function actionIndex()
    {
        $titulo = 'Hola Mundo';
        $h2 = 'Bienvenidos a mi primer controlador';
        $datetime = new DateTime();
        return $this->render(
            'index',
            [
                'titulo' => $titulo,
                'h2' => $h2,
                'datetime' => $datetime
            ]
        );
    }
    
    public function actionSuma()
    {
        $model = new InicioModel;
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $total = $model->suma();
            $respuesta = ("El resutlado es" . $total);

            return $this->render(
                'suma',
                [
                    'model' => $model,
                    'respuesta' => $respuesta,
                ]
            );
        }else{
            return $this->render(
                'suma',
                [
                    'model' => $model
                ]
            );
        }
    }
}