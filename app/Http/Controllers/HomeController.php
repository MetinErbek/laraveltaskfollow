<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\TaskStatuses;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    Public $data;
    public function __construct()
    {
        $this->middleware('auth');
        $this->data = [];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $this->data['totalTasks'] = Tasks::count();
        $this->data['totalFinished'] = Tasks::where('task_status_id', 7)->count();

        return view('home', $this->data);
    }
}
