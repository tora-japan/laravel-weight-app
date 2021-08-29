@extends('layouts.main',['title'=>'ヘルプ'])
@section('header')
<script src='{!!url('/')!!}/jquery/jquery.min.js'></script>

@endsection
@section('body')


<form method="POST" action="height">
@csrf

<img src="img/hakase_book_dokusyo.png" width="50%" style="display: block;margin-left: auto;margin-right: auto"><br>

<div>
<b>BMIについて</b><br>
BMI（Body Mass Index）とは、<br>
成人向けのボディ・マス指数と言われるものです。<br>
[体重(kg)]÷[身長(m)の2乗]で算出される値で、<br>
肥満や低体重（やせ）の判定に用いる。<br>
<table class="table">
<tr><td>18.5未満</td><td>低体重（やせ）</td></tr>
<tr><td>18.5以上25未満</td><td>普通体重</td></tr>
<tr><td>25.5以上</td><td>肥満</td></tr>
</table>
詳しくは<a href="https://www.e-healthnet.mhlw.go.jp/information/dictionary/metabolic/ym-002.html">こちら(厚生労働省)</a>を参照してください。<br>
<hr>
<b>グラフについて</b><br>
体重を毎日記録していくことで、体重のグラフとBMIのグラフを表示します。<br>
記録の空白ができた場所は、前日などの過去の記録の値を参照してグラフが表示されます。<br>
記録はその月の６カ月前まで記録されます。<br>
それ以前は破棄されます。<br>
<hr>
<b>週の記録について</b><br>
カレンダーの週をタップすると日曜日から土曜日までのグラフが表示されます
<hr>
<b>月間の記録について</b><br>
カレンダーの日付を２度タップするとダイアログが開き、日付に対する体重の値を修正できます。</br>
<img src="img/monthly1.png">
<hr>



<table class="table">
<tr> <td><b>作者</b></td> <td><b>tora</b></td></tr>

<tr> <td>git-hub</td> <td><a href="https://github.com/tora-japan/">tora-japan</a></td> </tr>
<tr> <td>source</td> <td><a href="https://github.com/tora-japan/laravel-weight-app">laravel-weight-app</a></td></tr>
<tr> <td>discord</td> <td>tora#3327</td></tr>
</table>

<br>
<hr>
<b>イラスト素材</b><br>
<a href="https://www.irasutoya.com/">イラスト屋</a><br>
<hr>
<b>ライブラリーやフレームワーク</b><br>

<a href="https://jquery.com/">jquery</a><br>
<a href="https://getbootstrap.jp/">Bootstrap</a><br>
<a href="https://www.chartjs.org/">chartjs</a><br>
<a href="https://www.php.net/">PHP8</a><br>
<a href="http://laravel.jp/">Laravel8</a><br>
<a href="https://jetstream.laravel.com/2.x/introduction.html">LaravelJetstream</a><br>
<a href="https://laravel-livewire.com/">livewire</a><br>
<a href="https://carbon.nesbot.com/">Carbon</a><br>
<a href="https://github.com/js-cookie/js-cookie">js-cookie</a><br>

<hr>

<b>ライセンス等</b><br>
本ソースコードのみ MIT<br>
<br>
※上記の記載のフレームワーク等のライセンスはリンク先のサイトの通りです。<br>
※イラストは<a href="https://www.irasutoya.com/p/terms.html">イラスト屋のライセンス</a>です<br>

</div>

@endsection
