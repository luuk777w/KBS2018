<?php

namespace Core;

class Auth
{

    public $salt = "sdf23*$#sdf2qFDSD123EDT#dsaGSWF#@#%F32DASF&*##@@#423423&Y4rFUE#WS*3";

    public function getHash($value)
    {
        return password_hash($value, PASSWORD_BCRYPT, ['salt' => $this->salt]);
    }

    public function makeCookie($user, $role)
    {
        $hasheduser = password_hash($user, PASSWORD_BCRYPT, ['salt' => $this->salt]);
        $hashedrole = password_hash($role, PASSWORD_BCRYPT, ['salt' => $this->salt]);

        setcookie("user", $hasheduser, time() + (86400 * 30), "/");
        setcookie("role", $hashedrole, time() + (86400 * 30), "/");
    }

    public function delCookie()
    {
        setcookie("user", "", time() - 3600);
        setcookie("role", "", time() - 3600);
    }

    public static function User()
    {
        if(isset($_COOKIE['user'])){

            $db = new DB();

            $name = $db->read("users", "WHERE hash ='${_COOKIE['user']}'");

            if($name != [])
            return $name[0]->username;

        }

        return "guest";
    }

    public static function Role()
    {
        if(isset($_COOKIE['role'])){

            if(password_verify('user', $_COOKIE['role'])){
                return "user";
            } else if(password_verify('admin', $_COOKIE['role'])){
                return "admin";
            }

        }
        return "guest";
    }

}