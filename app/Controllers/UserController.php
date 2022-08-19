<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use Config\Services;

class UserController extends BaseController
{
    public function index()
    {
        $users = new User();

        $data['title'] = 'Data Users';
        $data['users'] = $users->paginate(10);
        $data['pager'] = $users->pager;

        return view('pages/users/list_users', $data);
    }

    public function create()
    {
        $data['title'] = 'Create new user';
        $data['validation'] =  Services::validation();

        return view('pages/users/create_users', $data);
    }   
    
    public function store()
    {
        $validation =  Services::validation();

        $custom_message = [
            'regex_match' => 'Only characters, number & underscore allowed.',
            'is_unique' => '{value} already in use.'
        ];

        $validation->setRule('nip', 'NIP', 'required|is_unique[users.nip]', $custom_message);
        $validation->setRule('username', 'Username', 'required|regex_match[/^[a-zA-Z0-9_]*$/]|min_length[3]|is_unique[users.username]', $custom_message);
        $validation->setRule('email', 'Email', 'required|is_unique[users.email]', $custom_message);
        $validation->setRule('password', 'Password', 'required|min_length[4]');

        if ($validation->withRequest($this->request)->run() ) {
            $user = new User();
            $user->insert([
                'nip' => $this->request->getPost('nip'),
                'name' => $this->request->getPost('name'),
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'phone' => $this->request->getPost('phone'),
                'status' => 'active'
            ]);

            return redirect()->route('users.index');
        }

        return redirect()->route('users.create')->withInput();
    }

    public function detail($id)
    {
        $user = new User();

        return print_r($user->find($id));
    }
}
