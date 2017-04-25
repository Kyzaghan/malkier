@extends('layouts.master')
@section('title', 'Malkier')
<?php
$departments = DB::table('departments')->get();
?>
@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12">
                        <h3>Giriş Yap</h3>
                    </div>
                </div>
                <hr>
            </div>

            @if(count($errors) > 0)
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('signin')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group {{$errors->has('department') ? 'has-error' : ''}}">
                            <label for="department">
                                Departman
                            </label>
                            <select class="form-control" type="text" name="department"
                                   id="department" {{Request::old('department')}}>
                                @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
                            <label for="username">
                                Kullanıcı adınız
                            </label>
                            <input class="form-control" type="text" name="username"
                                   id="username" {{Request::old('username')}} />
                        </div>
                        <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                            <label for="password">
                                Şifreniz
                            </label>
                            <input class="form-control" type="password" name="password" id="password"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Giriş Yap</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
