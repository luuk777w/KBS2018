<?php

namespace Core;

class Auth
{
    private $salt = "sdf23*$#sdf2qFDSD123EDT#dsaGSWF#@#%F32DASF&*##@@#423423&Y4rFUE#WS*3";

    public function getHash($value)
    {
        return password_hash($value, PASSWORD_BCRYPT, ['salt' => $this->salt]);
    }

    public function isLoggedIn() {
        return false;
    }

    public function isAuthorized() 
    {
        session_start();

        if($this->isLoggedIn()) {
            return true;

        } else {

            $caller = debug_backtrace()[1]['function'];

            if(isset($_SESSION["OneTimeAuthorization_${caller}"])) {

                if($_SESSION["OneTimeAuthorization_${caller}"]) {
                    unset($_SESSION["OneTimeAuthorization_${caller}"]);
                    session_destroy();
                    return true;
                }

            } else {
                return false;
            }

        }

    }

    public function setOneTimeAuthorization($method) 
    {
        session_start();
        session_regenerate_id();
        $_SESSION["OneTimeAuthorization_${method}"] = TRUE;

        return true;
    }

    /**
     * Not Authorized
     *
     * @return void
     */
    public function error401(){
        $view = new View();
        return $view->render("error.error401");
    }

    /**
     * Forbidden
     *
     * @return void
     */
    public function error403(){
        $view = new View();
        return $view->render("error.error403");
    }
}