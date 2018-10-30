<?php

namespace App\Controllers;

use Core\Controller;

class LoginController extends Controller
{
    public function index()
    {

        return $this->view->render('login');
    }

}