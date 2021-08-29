@extends('layouts.main',['title'=>'今日の記録'])
@section('header')
<script src='{!!url('/')!!}/jquery/jquery.min.js'></script>
<script src='{!!url('/')!!}/chartjs/chart.min.js'></script>
@endsection
@section('body')

<form method="POST" action="weight">
@csrf
<div style="width:80%;margin-right: auto;margin-left : auto;">
@php /* echo $name; */ @endphp
</div>
<img src="img/kaden_taijukei.png" width="50%" style="display: block;margin-left: auto;margin-right: auto"><br>

<div class="card text-white bg-success mb-3">
  <div class="card-body">
    <p class="card-text">



<div style="width:80%;margin-right: auto;margin-left : auto;">
    今日の体重を入力 (kg)<br>
@if($weight=='')
    <input type="number" class="text" style="width:100%" name="weight" id="weight" step="0.1"><br>
    <input type="submit" class="btn btn-danger" value="登録"><br>
@else
    <input type="number" class="text" style="width:100%" name="weight" id="weight" step="0.1" value="{!! $weight !!}"><br>
    <input type="submit" class="btn btn-danger" value="更新"><br>
@endif    
    {!! $msg !!}<br>
</div>

    </p>
  </div>
</div>



<div style="background:#FFF;"><canvas id="myChart" height="150px"></canvas></div>


<script>
$(function(){
    data={!! $data !!};
    chartjsInit();
});


// chart.jsの初期化
function chartjsInit()
{
console.log('グラフの初期化');
ctx = document.getElementById('myChart').getContext('2d');
// 最大値、最小値を計算
calc_maxmin();

// 登録
// chart.jsの定義 開始 ---------------------------------------------------
myChart = new Chart(ctx, {
type: 'line',
data: {
labels: data[1],
datasets: [
{
label: '体重',
data: data[2],
borderColor: '#f00',
yAxisID: 'y',
},
{
label: 'BMI',
data: data[3],
borderColor: '#00f',
yAxisID: 'y2',
},],
},
options: {
scales: {
y: {
min: weight_min,
max: weight_max,
ticks: {
color: '#f00',
callback: function(value, index, values){
return value + 'kg';
},
},
},
y2: {
min: bmi_min,
max: bmi_max,
position: 'right',
ticks: {
color: '#00f',
},
},
},
},
});
// chart.jsの定義 終了 ---------------------------------------------------
}

// 最大最小の計算
function calc_maxmin()
{
    weight_min=Math.round(data[2].reduce(min_number)) -1;
    weight_max=Math.round(data[2].reduce(max_number)) +1;
    if(weight_max<=1) weight_max=0;
    if(weight_min<0) {
      weight_min=0;
      if(1<=weight_max){
        weight_min=Math.round(data[2].reduce(min_number_nonzero)) -1;
        if(weight_min<0) weight_min=0;
      }
    }
    // bmiは固定に変更
    bmi_min   = 15; // 18未満痩せすぎ
    bmi_max   = 40; // 40以上は肥満
}

// 最大値
function max_number(a,b)
{
    return a>b?a:b;
}
// 最小値
function min_number(a,b)
{
    return a<b?a:b;
}
// 0を抜いた最小値
function min_number_nonzero(a,b)
{
  if(a==0) return b;
  if(b==0) return a;
  return a<b?a:b;
}


</script>

@endsection
