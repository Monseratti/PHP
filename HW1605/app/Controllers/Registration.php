<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;
use Symfony\Component\HttpFoundation\Request;

class Registration extends BaseController
{
    public function index()
    {
        return view("registration/index");
    }
    
    public function create(){
        $db = db_connect();
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('pass');
        $name = $this->request->getPost('name');
        $surname = $this->request->getPost('surname');
        $birthday = $this->request->getPost('birthday');
        $country = $this->request->getPost('country');

        $builder = $db->table('User');
        $builder->where('login', $login);
        $existingUser = $builder->get()->getRow();
        if ($existingUser) {
            return redirect()->back();
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'login' => $login,
            'password' => $hashedPassword,
            'name' => $name,
            'surname' => $surname,
            'birthday' => $birthday,
            'country' => $country
        ];
        $builder->insert($data);
        if ($db->affectedRows() > 0) {
            return redirect()->to('login');
        }
    }
}
