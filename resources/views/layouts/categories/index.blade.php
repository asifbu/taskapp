@extends('layouts.app')
@section('contents')
<form action="{{route('categories.create')}}" method="get">
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
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
@endsection