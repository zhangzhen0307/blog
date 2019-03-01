@extends('layouts.default_home')
@section('title')
    更新个人资料
@endsection
@section('content')
    <div class=" card">
        <div class=" card-header">
            <h5>更新个人资料</h5>
        </div>
        <div class="card-body">
            @include('shared._errors')
            <form method="POST" action="{{route('users.update',$user->id)}}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">名称：</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                </div>
                
                <div class="form-group">
                    <label for="email">邮箱：</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
                </div>
                
                <button type="submit" class="btn btn-primary">更新</button>
            </form>
        </div>
    </div>
@endsection