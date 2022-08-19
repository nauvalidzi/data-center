<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Log;

class LogController extends BaseController
{
    public function index()
    {
        $logs = new Log();

        $data['title'] = 'Data Log Users';
        $data['logs'] = $logs->log_list()['paginate'];
        $data['pager'] = $logs->log_list()['pager'];

        return view('pages/logs/index', $data);
    }
}
