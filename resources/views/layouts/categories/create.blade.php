@extends('layouts.app')
@section('contents')
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