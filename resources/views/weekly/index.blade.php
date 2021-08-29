@extends('layouts.main',['title'=>'週の記録'])
@section('header')
<script src='{!!url('/')!!}/jquery/jquery.min.js'></script>
<script src='{!!url('/')!!}/chartjs/chart.min.js'></script>
<style>
.calendar{font-size:10px;}
</style>
@livewireStyles
@endsection
@section('body')
@livewire('weekly')
@livewireScripts
@endsection
