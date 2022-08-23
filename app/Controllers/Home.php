<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('login');
    }
}
