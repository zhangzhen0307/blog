@extends('layouts.default_home')
@section('title')
    index
@endsection
@section('content')
<div>
    <h2 class="text-center">所有用户</h2>
    <div class="list-group list-group-flush">
        @foreach ($users as $user)
        @include('shared._user')
        @endforeach
    </div>
      
    <div class="mt-3">
        {!! $users->render() !!}
    </div>
</div>
@endsection