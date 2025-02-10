<?php

namespace src;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);
           
        include "Views/$view.php";
    }
}