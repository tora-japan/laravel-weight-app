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
@include('layouts.include.menu',[
  'title'=>$title,
  'menuInfo'=>[
    ['link'=>'/weight' ,'title'=>'今日の記録' ],
    ['link'=>'/weekly' ,'title'=>'週の記録' ],
    ['link'=>'/monthly','title'=>'月間の記録' ],
    ['link'=>'/height' ,'title'=>'身長の変更' ],
    ['link'=>'/help' ,'title'=>'ヘルプ' ],
    
  ]
])
@yield('body')</body>
</html>
