@extends('layouts.master')
@section('title', 'Malkier')
<?php
$departments = DB::table('departments')->get();
$errorlist = "";
foreach($errors->all() as $error)
    {
        $errorlist = $errorlist . $error.'\n';
    }
?>
@section('header')
    <!-- Notify JS Latest compiled and minified JavaScript -->
    <script src="{{ asset('js/plugin/notify/notify.min.js') }}"></script>
@endsection

@section('content')
    @if(count($errors) > 0)
        <script type="text/javascript">
            $(function() {
                $('header').notify(
                    "{{$errorlist}}",
                    { position:"bottom center" }
                );
            });
        </script>
    @endif
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
