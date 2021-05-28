<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

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

    public function handleContact()
    {
        var_dump($_POST);
        exit;

        /*$body = Application::$app->request->getBody();
        var_dump($body);
        exit;*/

        return "Procesando informacion";
    }
}
