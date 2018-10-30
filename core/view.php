<?php

namespace Core;

use Philo\Blade\Blade;

class View{

    public function render($view, $data = []){

        $views = realpath('./app/views');
        $cache = realpath('./cache');

        $blade = new Blade($views, $cache);

        return $blade->view()->make($view, $data)->render();

    }

}