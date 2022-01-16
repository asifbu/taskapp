@extends('layouts.app')
@section('contents')
<form action="{{route('categories.create')}}" method="get">
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
@endsection