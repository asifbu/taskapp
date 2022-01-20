<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Http\Requests\TaskRequest;
use App\Models\category;
use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $data['task_list'] = task::where('created_by',Auth::id())->get();
     
        return view('layouts.task.index',$data);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["task_status"] = TaskStatus::asSelectArray();
        $data["categories_list"] = category::where('created_by',Auth::id())->get();
        return view('layouts.task.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = new task();
        $task->name = $request->task_name;
        $task->category_id = $request->categoty_id;
        $task->details = $request->task_details;
        $task->status = $request->status;
        $task->deadline = $request->task_deadline;
        $task->created_by = Auth::id();
        $task->save();
        
        return redirect('/task');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['task'] = task::find($id);
        $data["task_status"] = TaskStatus::asSelectArray();
        $data["categories_list"] = category::where('created_by',Auth::id())->get();
       return view('layouts.task.edit',$data);
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
        $task_update = task::where('created_by',Auth::id())->find($id);
        if(!$task_update)
        {
            return redirect('/task');
        }

        $task_update->name = $request->task_name;
        $task_update->category_id = $request->categoty_id;
        $task_update->details = $request->task_details;
        $task_update->status = $request->status;
        $task_update->deadline = $request->task_deadline;
        $task_update->save();
        
        return redirect('/task');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = task::where('created_by',Auth::id())->find($id);
        if(!$task)
        {
            return redirect('/task');
        }
        $task->delete();

        return redirect('/task');
    }
}
