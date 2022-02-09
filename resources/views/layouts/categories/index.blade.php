@extends('layouts.app')
@section('contents')
<form action="{{route('categories.create')}}" method="get">
  <button type="submit" class="btn btn-primary">Add Category</button>

  
</form>
<div class="part" style="display: flex" >
<div class="part1" style="width:400px; margin-right:50px">

  <form class="form-horizontal" action="{{route('categories.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Category Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>

</div>
<div class="part2"  style="width:500px">
    <table class="table table-bordered"> 
      <tr>
        <th>Name</th>
        <th>Action</th>
      </tr>
      @foreach ($category_list as $item)
      <tr>
        <td>{{$item->name}}</td>
        <td>
          <a href="{{url("/categories/$item->id/edit")}}" class="btn btn-warning">Update</a>
          <a href="{{url("/categories/$item->id/delete")}}" class="btn btn-danger">Delete</a>
        </td>
      </tr> 
      @endforeach
      
    </table>
</div>
</div>
@endsection