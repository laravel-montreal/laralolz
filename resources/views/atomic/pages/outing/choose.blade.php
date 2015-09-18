@extends('atomic.templates.base')

@section('pageTitle')
    Insert clever slogan here
@stop

@section('bodyClass')
    home
@stop

@section('navbar')
    @include('atomic.molecules._common.navbar')
@stop

@section('main')
    @include('atomic.atoms._common.breadcrumbs', ['breadCrumbs' => 'fooBreadCrumbs'])
    @include('atomic.molecules._common.header',    ['title' => 'fooTitle', 'subTitle' => 'fooSubTitle'])
    @include('atomic.organisms.outing.list')
@stop

@section('footer')
    @include('atomic.molecules.footer')
@stop