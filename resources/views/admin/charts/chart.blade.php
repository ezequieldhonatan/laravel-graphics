@extends('adminlte::page')

@section('title', 'Relatório mensal de vendas')

@section('content_header')
    <h1>
        Relatório mensal de Vendas
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a class="active" href="#">Gráficos</a></li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')
            
                {!! $chart->container() !!}

            </div>
        </div>
    </div>
@stop

@push('js')

{!! $chart->script() !!}

@endpush