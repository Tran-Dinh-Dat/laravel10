@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div style="display:">
    <img width="300" src="{{ get_image('tmp/nCOVOJmLqW.jpg') }}" alt="">
    <img width="300" src="{{ get_image_facade('tmp/IcYYSyynHh.jpg') }}" alt="">
    <img width="300" src="{{ StorageViewerFacade::getImage('tmp/F3lZTAwBcw.webp') }}" alt="">
</div>

<div>
    @dd($menuItem)
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop