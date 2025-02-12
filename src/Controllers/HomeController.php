<?php

namespace App\Controllers;

use App\Controller;


class HomeController extends Controller
{
    public function index()
    {

        // $journals = [
        //     new Journal('testjournal', '2025'),
        //     new Journal('testtest', '2024')
        // ];

        $this->render('index', []);
    }

    public function test(){
        $this->render('login', []);

    }
}