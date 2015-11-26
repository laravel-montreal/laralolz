@extends('atomic.templates.base')

@section('bodyClass')
    home
@stop

@section('navbar')
    @include('atomic.molecules.home.navbar')
@stop

@section('main')
    @include('atomic.molecules.home.header')
    @include('atomic.organisms.event.list')
@stop

@section('footer')
    @include('atomic.molecules.footer')
@stop