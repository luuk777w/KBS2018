<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Categories;
use App\Models\Account;

class AccountController extends Controller
{

    public function index(){

        $auth = new Auth();
        if(!$auth->isLoggedIn()){
            return $auth->error401();
        }

        $account = new Account();

        $data = $account->getAccount($auth->getId());

        return $this->view->render("account", compact("data"));

    }

}