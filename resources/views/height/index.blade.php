@extends('layouts.main',['title'=>'身長の変更'])
@section('header')
<script src='{!!url('/')!!}/jquery/jquery.min.js'></script>

@endsection
@section('body')

<img src="img/kenkoushindan01_shinchou_girl_kakato.png" width="50%" style="display: block;margin-left: auto;margin-right: auto"><br>

<div class="card text-white bg-success mb-3">
  <div class="card-body">
    <p class="card-text">
    
<form method="POST" action="height">
@csrf

<div style="width:80%;margin-right: auto;margin-left : auto;">
身長を入力して下さい(単位cm)<br>※bmi計算で使います<br>
<input type="number" id="height" name="height" min="1" max="999" value="{{ $height }}" style="width:100%;"><br>
<input type="submit" class="btn btn-danger" value="送信"><br>
{!! $msg !!}
</div>
</form>

</p></div></div>

@endsection
