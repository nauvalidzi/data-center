<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Checklist;

class ChecklistController extends BaseController
{
    public function index()
    {
        $checklist = new Checklist();

        $data['title'] = 'Data Daily Checklists';
        $data['checklists'] = $checklist->paginate(10);
        $data['pager'] = $checklist->pager;

        return view('pages/checklists/checklists', $data);
    }
}
