<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        return view('login/index');
    }

    public function login()
    { 
        $username = $this->request->getPost('login');
        $password = $this->request->getPost('pass');
        
        $db = db_connect();
        $builder = $db->table('User');
        
        $builder->where('login', $username);
        $user = $builder->get()->getRow();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        
        if (password_verify($password, $user->password)) {
            return redirect()->to('/')->with('success', 'Success');
        } else {
            return redirect()->back()->with('error', 'Invalid password');
        }
    }
}
