<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Registration extends BaseController
{
    public function index()
    {
        return view("regisrtation/index");
    }
}
