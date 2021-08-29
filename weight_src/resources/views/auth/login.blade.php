@extends('layouts.top',['title'=>'ログインをしよう','skip'=>'ログイン'])
@section('header')

<script src='{!!url('/')!!}/jquery/jquery.min.js'></script>

<script src='{!!url('/')!!}/js-cookie/js.cookie.min.js'> </script>
@endsection
@section('body')


<img src="{!!url('/')!!}/img/kenkoushindan03_taijuu_boy.png" width="50%" style="display: block;margin-left: auto;margin-right: auto"><br>

<div class="card text-white bg-success mb-3">
  <div class="card-body">
    <p class="card-text">

<form method="POST" action="{{ route('login') }}">
    @csrf
  <div style="display: block;margin-left: auto;margin-right: auto;width:80%">
    ログイン名（e-mailアドレス）<br>
    <input id="email" type="email" name="email" required="required" autofocus="autofocus" class="form-control" ><br>
    
    パスワード<br>
    <input id="password" type="password" name="password" required="required" autocomplete="current-password"  class="form-control"><br>

    {{-- <input type="checkbox" id="remember_me" name="remember"> --}}
    <input type="submit" class="btn btn-danger" value="送信"></input>
  </div>
</form>

    </p>
  </div>
</div>

<script type="text/javascript">
  $(function(){
    $("#email").val( Cookies.get("email") );
    $("#password").val( Cookies.get("password") );    
    $("#email").change(function(){ Cookies.set("email", $("#email").val(), { expires: 365 });});
    $("#password").change(function(){ Cookies.set("password", $("#password").val(), { expires: 365 });});
  });

</script>


@endsection
