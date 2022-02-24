<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\TaskStatuses;

class TasksController extends Controller
{
    Public $data;
    function __construct()
    {
      $this->data = [];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['Statuses'] = TaskStatuses::get();
        $this->data['status_filter'] = isset($_GET['status_filter']) ? $_GET['status_filter']:NULL;
        $this->data['Tasks'] = Tasks::WithFilter($this->data)->with('status')->get();
        return View('tasks', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try{
        $req = $request->toArray();
        $req['task_status_id'] = 1;
        $NewTask  = new Tasks($req);
        $NewTask->save();

        return redirect()->back()->withErrors([__('Task Saved')]);

      } catch(Exception $e)
      {
        return redirect()->back()->withErrors([$e->getMessage()]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Task = Tasks::where('id', $id)->first();
        if($Task)
        {
          $this->data['Statuses'] = TaskStatuses::get();
          $this->data['Task'] = $Task;
          return View('taskdetails', $this->data);

        } else {
            return redirect()->back()->withErrors([__('Task Not Found')]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $Task = Tasks::where('id', $id)->first();
      if($Task)
      {

        $req = $request->toArray();
        $Task->fill($req);
        $Task->save();
        return redirect()->back()->withErrors([__('Task Updated')]);

      } else {
          return redirect()->back()->withErrors([__('Task Not Found')]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Task = Tasks::where('id', $id)->first();
        $Task->delete();
        return redirect()->back()->withErrors([__('Task Deleted')]);
    }

    public function taskStatusChange(Request $request)
    {
        $id = request()->get('task_id');
        //dd($request->toArray());exit;
        $Task = Tasks::where('id', $id)->first();
        if($Task)
        {

          $req = $request->toArray();
          $Task->fill($req);
          $Task->save();
          return redirect()->back()->withErrors([__('Task Status Updated')]);

        } else {
            return redirect()->back()->withErrors([__('Task Not Found')]);
        }
    }
}
