<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Product extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $data = $model->findAll();
        return view('product/index', compact('data'));
    }
    public function show($param)
    {
        
    }
}
