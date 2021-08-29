@php
// カレンダーを更新したら、更新データ(json)を返すためのデスパッチイベント
$this->dispatchBrowserEvent('updated', ['ajaxJson' => $ajaxJson]);
@endphp

<div>

<style>
.swipe{}
</style>


    <div id='dlg_main'>
        <div id='dlg1' style='display:none;'>
            <h3 class='dlg_title'>体重を変更する</h3>
            <div class='dlg_body'>
                <p id='dlg1_date'>2021-08-10</p>
                <input type="number" class="text" style="width:100%" name="weight" id="weight" step="0.1"><br>
            </div>
            <div class='dlg_foot'>
                <span class='dlg_ok btn btn-primary' onclick='dlg1_click()'>ok</span>
                <span class='dlg_cancel btn btn-primary' onclick='dlgClose()'>cancel</span>
            </div>
        </div>        
    </div>



    {{-- カレンダーのヘッダー部分 --}}
    <table width="100%">
        <tr>
            <td align="left" width="96px">
                @if($back!=="")<span wire:click="back" class="btn btn-primary btn-sm" style="width:100%">◀ {!! $back
                    !!}</span>@endif
            </td>
            <td align="center"><span class="align-middle">{!! $currentDate->format('Y年m月') !!}</span></td>
            <td align="right" width="96px">
                @if($next!=="")<span wire:click="next" class="btn btn-primary btn-sm" style="width:100%">{!! $next !!}
                    ▶</span>@endif
            </td>
        </tr>
    </table>
    {{-- カレンダーを構成する--}}
    <table class="table table-bordered calendar swipe" width="100%">
        <thead>
            <tr>
                @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
                <th style="text-align: center">{!! $dayOfWeek !!}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @php
            foreach ($calenderArray as $index => $p) {
                if ($p[1]->dayOfWeek == 0) {
                    echo '<tr>' . PHP_EOL;
                }
                echo '<td align=\'center\' date=\'' . $p[1]->format('Y-m-d') . '\' ';
                echo 'weight=\''.$p[2].'\'';

                if ($p[1]->month != $currentDate->month) {
                    echo 'class=\'bg-secondary\' ';
                }
                // isEdit
                if($p[3]){
                    echo 'id=\'ui' . $index . '\' onclick="myClick(\'#ui' . $index . '\')" ' . PHP_EOL;
                }else{
                    echo 'style="background-color: #AAA" ';
                }

                if($p[1]->day < 10)
                {
                    echo '><b>&nbsp;' . $p[1]->day . '</b><br>';
                }else{

                    echo '><b>' . $p[1]->day . '</b><br>';
                }
                // isShow
                if ($p[0]) echo $p[2];

                echo '　</td>' . PHP_EOL;
                if ($p[1]->dayOfWeek == 6) echo '</tr>' . PHP_EOL;
            }
            @endphp
        </tbody>
    </table>
    <div style="background:#FFF;"><canvas id="myChart" height="150px" class="swipe"></canvas></div>

    <script>
var ctx;
var weight_min,weight_max;      // bmi  最小値、最大値
var bmi_min,bmi_max;            // 体重 最小値、最大値
var date_position;              // 日付の位置
var date_positionThis=null;     // 日付の thisを保存
var data;                       // グラフ用のデータ

$(function() {
    data = {!!$ajaxJson!!};
    chartjsInit();
    // livewireの更新データを受け取る
    window.addEventListener('updated', event => {
//        console.log(    event.detail.ajaxJson );
        data = JSON.parse(event.detail.ajaxJson);
        console.log('livewireの更新データを受け取る');
        console.log(data);
        
        // チャートのデータを更新する
        chartjsUpdate();
    });

    $(".swipe").on("touchstart", touchstart);
    $(".swipe").on("touchmove", touchmove);
    $(".swipe").on("touchend", touchend);
    

})

// chart.jsの初期化
function chartjsInit()
{
    console.log('グラフの初期化');
//    console.log(data);
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


// chart.jsのデータを更新
function chartjsUpdate()
{
    console.log('グラフの更新');
    // 最大値、最小値を計算
//    console.log(data);
    calc_maxmin();
    myChart.data.labels=data[1];
    myChart.data.datasets[0].data = data[2];
    myChart.data.datasets[1].data = data[3];
    myChart.options.scales.y.min=weight_min;
    myChart.options.scales.y.max=weight_max;
    myChart.options.scales.y2.min=bmi_min;
    myChart.options.scales.y2.max=bmi_max;    

    myChart.update();
}

// 最大最小の計算
function calc_maxmin()
{
    //console.log('最大最小の計算');
    // data[0] .. 未定義
    // data[1] .. ラベル名
    // data[2] .. 体重の配列
    // data[3] .. bmiの配列
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

    // bmi_min   =Math.round(data[3].reduce(min_number))-5;
    // bmi_max   =Math.round(data[3].reduce(max_number))+5;
    // if(bmi_max<=5) bmi_max=0; if(bmi_min<0) bmi_min=0;

    // bmiは固定に変更
    bmi_min   = 15; // 18未満痩せすぎ
    bmi_max   = 40; // 40以上は肥満
//    console.log('weight_min', weight_min, 'weight_max', weight_max, 'bmi_min', bmi_min, 'bmi_max', bmi_max);
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

// カレンダーをクリックしたときの動作
function myClick(myID)
{
    //console.log(myID);
    // 自身のセレクター
    myThis= $(myID);
    if(date_positionThis!==null){
        // 
        if(date_positionThis.attr("id") == myThis.attr("id"))
        {
            myThis.css({'background-color': '#F00','color': '#FFF'});


            // var date= new Date(myThis.attr("date"));
            // $('#dlg1_date').text(date.getFullYear() + '年' + date.getMonth() + '月' + date.getDay() + '日');          


            var date= new Date(myThis.attr("date"));
            $('#dlg1_date').text(date.getFullYear() + '年' + (date.getMonth()+1) + '月' + date.getDate() + '日');
           

//            $('#dlg1_date').text(myThis.attr("date"));
            $('#weight').val(myThis.attr("weight"));
            dlgOpen(1,300,230);
            return;
        }
        // 以前の選択色を戻す
        $(date_positionThis).css({'background-color': '#FFF','color': '#000'});
    }
    // クリックした週の色を選択色にする
    myThis.css({'background-color': '#000','color': '#FFF'});    
    // 保存する
    date_positionThis=myThis;
}
function dlg1_click()
{
    // let date= $('#dlg1_date').text();
    let date = myThis.attr("date");
    let weight = $('#weight').val();

    //console.log(date);
    //console.log(weight);

    dlgClose();
    Livewire.emit('weightUpdate',date,weight);
}






posX=0;
moveX=0;
function touchstart(event)
{
    posX = event.originalEvent.touches[0].pageX;
}

function touchmove(event)
{
    moveX = event.originalEvent.touches[0].pageX;
}

function touchend(event)
{

  if (posX - moveX > 180)
  {
      if( (data[4] & 2) == 2) Livewire.emit('next');
      return;
  }
  if (posX - moveX < -180){
      if( (data[4] & 1) == 1) Livewire.emit('back');
      return;
  }

}




    </script>

</div>