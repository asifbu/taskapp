@extends('layouts.app')
@section('contents')
<form class="form-horizontal" action="{{route('task.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Task Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="task_name" placeholder="Enter task Name">
      </div>
      <br>
      <br>

      <label class="control-label col-sm-2" >Category:</label>
      <div class="col-sm-10">
        
        <select name="categoty_id" class="form-control">
          <option value="">----select Category----</option>
          @foreach ($categories_list as $category)
             <option value="{{$category->id}}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
    <br>
    <br>

      <label class="control-label col-sm-2" for="email">Task Details:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="task_details" placeholder="Enter task details">
      </div>
      <br>
      <br>

      <label class="control-label col-sm-2" for="email">Task Deadline:</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="task_deadline" placeholder="Enter task deadline">
      </div>

      <br>
      <br>
      <label class="control-label col-sm-2" for="email">Task status:</label>
      <div class="col-sm-10">
      <select name="status" class="form-control">
        <option value="">----select Status----</option>
        @foreach ($task_status as $key => $status)
           <option value="{{$key}}">{{ $status }}</option>
        @endforeach
      </select>
      </div>

      <br>
      <br>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>

    </div>
   
  </form>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  

@endsection