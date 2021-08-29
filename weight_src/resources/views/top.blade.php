@extends('layouts.top',['title'=>'毎日体重を記録しよう！','skip'=>'トップページ'])
@section('header')
<script src='{!!url('/')!!}/chartjs/chart.min.js'></script>
@endsection
@section('body')


<img src="img/kaden_taijukei.png" width="50%" style="display: block;margin-left: auto;margin-right: auto"><br>

<div class="card text-white bg-success mb-3">
  <div class="card-body">
    <p class="card-text">
        １日１回、自分の体重を計った時に、記録していくためのサイトです<br>
        ・毎日記録していけば、体重をグラフ化して見ることができます<br>
    </p>
    <div style="background:#FFF;"><canvas id="myChart"  height="150px"></canvas></div>
  </div>
</div>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
data ={
    labels: [],
    datasets: [
      {
        label: '体重',
        data: [],
        borderColor: '#f00',
        yAxisID: 'y',
      },
      {
        label: 'BMI',
        data: [],
        borderColor: '#00f',
        yAxisID: 'y2',
      },
    ],
};
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
function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}

height = 1.64;
// てきとーにデータを作る
for(i=0;i<31;i++)
{
  data.labels[i]='xx月'+(i+1)+'日';
  weight = 60 + (getRandomInt(20)/10) +(30-i)/10 ;
  data.datasets[0].data[i]= weight;
  bmi = weight /height/height;
  data.datasets[1].data[i]=bmi;
}
weight_min=Math.round(data.datasets[0].data.reduce(min_number)) -1;
weight_max=Math.round(data.datasets[0].data.reduce(max_number)) +1;
var myChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: {
    scales: {
      y: {
        min: weight_min,
        max: weight_max,
        ticks: {
          color: '#f00',
          callback: function(value, index, values){
              return  value +  'kg';
          },
        },
      },
      y2: {
        min: 15,
        max: 40,
        position: 'right',
        ticks: {
          color: '#00f',
        },
      },
    },
  },
});

</script>

@endsection
