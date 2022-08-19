<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use Config\Services;

class AuthController extends BaseController
{
    public function login()
    {
        return view('layouts/login.php');
    }

    public function login_authenticating()
    {
        $validation =  Services::validation();
        $user = new User();

        $validation->setRule('username', 'Username', 'required|regex_match[/^[a-zA-Z0-9_]*$/]|min_length[3]|is_unique[users.username]');

        $user->where('username', $this->request->getPost('username'))->first();
    }
}
