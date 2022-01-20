@extends('layouts.app')
@section('contents')
<form action="{{route('task.create')}}" method="get">
  <button type="submit" class="btn btn-primary">Add Task</button>
</form>
<table class="table table-bordered"> 
  <tr>
    <th>Task Name</th>
    <th>Task Details</th>
    <th>Category Name</th>
    <th>Task Status</th>
    <th>Task Deadline</th>
    <th>Created By </th>
    <th>Action</th>
  </tr>
  @foreach ($task_list as $task)
  <tr>
    <td>{{$task->name}}</td>
    <td>{{$task->details}}</td>
    <td>{{$task->category->name}}</td>
    {{-- <td>{{$task->status}}</td> --}}
    <td>{{App\Enums\TaskStatus::getDescription($task->status)}}</td>
    <td>{{$task->deadline}}</td>
    {{-- <td>{{$task->User}}</td> --}}
    {{-- <td>{{$task->created_by}}</td> --}}
    <td>{{Auth::User()->name}}</td>

    <td>
      <a href="{{url("/task/$task->id/edit")}}" class="btn btn-warning">Update</a>
      <a href="{{url("/task/$task->id/delete")}}" class="btn btn-danger">Delete</a>
    </td>
  </tr> 
  @endforeach
  
</table>
@endsection