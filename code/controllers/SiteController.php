<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home', [
            'name' => 'Juan',
            'surname' => 'Perez',
        ]);
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request)
    {
        /*$body = Application::$app->request->getBody();
        var_dump($body);
        exit;*/
        $body = $request->getBody();

        // Validar datos
        // Crear modelo


        return "Procesando informacion";
    }
}
