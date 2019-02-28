@extends('layouts.default_home')
@section('title')
    {{$user->name}}
@endsection
@section('content')
    {{$user->name}},{{$user->email}}
@endsection