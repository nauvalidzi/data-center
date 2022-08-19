<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Group;
use Config\Services;

class GroupController extends BaseController
{
    public function index()
    {
        $groups = new Group();

        $data['title'] = 'Data Groups';
        $data['groups'] = $groups->paginate(10);
        $data['pager'] = $groups->pager;

        return view('pages/groups/list_groups', $data);
    }

    public function create()
    {
        $data['title'] = 'Create new group';
        $data['validation'] =  Services::validation();

        return view('pages/groups/create_group', $data);
    }

    public function store()
    {
        $validation =  Services::validation();

        $custom_message = [
            'regex_match' => 'Only characters, number & underscore allowed.',
            'is_unique' => '{value} already in use.'
        ];

        $validation->setRule('code', 'Code', 'required|regex_match[/^[a-zA-Z0-9_]*$/]|min_length[2]|is_unique[groups.code]', $custom_message);
        $validation->setRule('name', 'Name', 'required|min_length[2]');

        if ($validation->withRequest($this->request)->run()) {
            $user = new Group();
            $user->insert([
                'code' => $this->request->getPost('code'),
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            return redirect()->route('groups.index');
        }

        return redirect()->route('groups.create')->withInput();
    }

    public function detail($id)
    {
        $group = new Group();

        return print_r($group->find($id));
    }
}
