<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{$title}}</title>
<!-- Bootstrap CSS -->
<link rel='stylesheet' type='text/css' href='{!!url('/')!!}/bootstrap/css/bootstrap.min.css'>
<!-- Bootstrap JS -->
<script src='{!!url('/')!!}/bootstrap/js/bootstrap.min.js'></script>
<style>
body {
    font-family: 'Nunito', sans-serif;
   -ms-user-select: none;
   -moz-user-select: -moz-none;
   -khtml-user-select: none;
   -webkit-user-select: none;
   user-select: none;
    
}
.mytitle{
    padding: 1rem 1.5rem;
    background: #198754;
    color:#FFF;
    font-size: 24px;
    border-radius: 5px;
}
</style>
@yield('header')
    </head>
<body>
{{-- ナビゲーションメニューを構成する（メニュー内で同名のタイトルは表示無し） --}}
@include('layouts.include.menu2',[
  'title'=>$title,
  'skip'=>$skip,
  'menuInfo'=>[
    ['link'=>'/' ,'title'=>'トップページ' ],
    ['link'=>'/login' ,'title'=>'ログイン' ],
    ['link'=>'/register','title'=>'ユーザー登録' ],
  ]
])
@yield('body')</body>
</html>
