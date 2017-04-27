@extends('layouts.master')
@section('title', 'Profil')
<?php
$departments = DB::table('departments')->get();
$errorlist = "";
foreach ($errors->all() as $error) {
    $errorlist = $errorlist . $error . '\n';
}
?>
@section('footer')
    @if(count($errors) > 0)
        <script type="text/javascript">
            $(function () {
                $('header').notify(
                    "{{$errorlist}}",
                    {position: "bottom center"}
                );
            });
        </script>
    @endif

    @if(session('status'))
        <script type="text/javascript">
            $(function () {
                $('header').notify(
                    "İşlem başarı ile tamamlandı.",
                    {position: "bottom center", className:"success"}
                );
            });
        </script>
    @endif

@endsection

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12">
                        <h3>Profiliniz</h3>
                    </div>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('saveprofile')}}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                    <label for="email">
                                        E-Posta adresiniz
                                    </label>
                                    <input class="form-control" type="text" name="email"
                                           id="email" value="{{(Request::old('email') && $errors->has('email')) ? Request::old('email') : Auth::user()->email}}"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
                                    <label for="username">
                                        Kullanıcı adınız
                                    </label>
                                    <input class="form-control" type="text" name="username"
                                           id="username" value="{{(Request::old('username') && $errors->has('username')) ? Request::old('username') : Auth::user()->username}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name">
                                        İsim
                                    </label>
                                    <input class="form-control" type="text" name="name"
                                           id="name" value="{{(Request::old('name') && $errors->has('name')) ? Request::old('name') : Auth::user()->name}}"/>

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group {{$errors->has('surname') ? 'has-error' : ''}}">
                                    <label for="name">
                                        Soyisim
                                    </label>
                                    <input class="form-control" type="text" name="surname"
                                           id="surname" value="{{(Request::old('surname') && $errors->has('surname')) ? Request::old('surname') : Auth::user()->surname}}"/>

                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
