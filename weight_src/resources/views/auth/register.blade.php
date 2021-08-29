@extends('layouts.top',['title'=>'ユーザー登録をしよう','skip'=>'ユーザー登録'])
@section('header')
@endsection
@section('body')

<form method="POST" action="{{ route('register') }}">
    @csrf

<div style="display: block;margin-left: auto;margin-right: auto;width:80%">
ニックネーム<br>
<input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /></input><br>
ログイン名（e-mailアドレス）<br>
<input id="email" class="form-control" type="email" name="email" :value="old('email')" required /></input><br>
パスワード(8文字以上)<br>
<input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" /></input><br>
パスワードもう一度<br>
<input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" /></input><br>

身長を入力して下さい(単位cm)<br>※bmi計算で使います<br>
<input id="height" name="height" type="number" value="old('height',160)"></input><br>
<input type="submit" class="btn btn-primary" value="登録"></input>
</form>
<img src="/img/kenkoushindan01_shinchou_girl_kakato.png" width="50%" style="display: block;margin-left: auto;margin-right: auto"><br>
</div>

@endsection




