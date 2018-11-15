<?php

namespace App\Controllers;

use Core\Controller;

class ErrorController extends Controller
{
    /**
     * Not Authorized
     *
     * @return void
     */
    function error401(){
        return $this->view->render("error.error401");
    }

    /**
     * Forbidden
     *
     * @return void
     */
    function error403(){
        return $this->view->render("error.error403");
    }

    /**
     * Not found
     *
     * @return void
     */
    function error404(){
        return $this->view->render("error.error404");
    }

    /**
     * Method not allowed
     *
     * @return void
     */
    function error405(){
        return $this->view->render("error.error405");
    }

}