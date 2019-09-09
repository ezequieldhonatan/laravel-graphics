@extends('adminlte::page')

@section('title', 'Relatório mensal de vendas')

@section('content_header')
    <h1>
        Vue JS  
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="#">Gráficos</a></li>
        <li><a class="active" href="#">Vue JS</a></li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                Relatório com Vue JS

            </div>
        </div>
    </div>
@stop