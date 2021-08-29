@extends('layouts.main',['title'=>'月間の記録'])
@section('header')
<script src='{!!url('/')!!}/jquery/jquery.min.js'></script>
<script src='{!!url('/')!!}/chartjs/chart.min.js'></script>

<link rel='stylesheet' type='text/css' href='{!!url('/')!!}/css/my_dlg.css'>
<script src='{!!url('/')!!}/js/my_dlg.js'> </script>
<style>
.calendar{font-size:10px;}
</style>
@livewireStyles
@endsection
@section('body')

@livewire('monthly')
@livewireScripts

<script>
</script>

@endsection
