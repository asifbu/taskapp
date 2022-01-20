@extends('layouts.app')
@section('contents')
    <h3>{{Auth::User()->name}}</h3>
   
@endsection
