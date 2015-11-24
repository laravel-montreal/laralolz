@extends('atomic.templates.base')

@section('pageTitle')
    Laralolz
@stop

@section('bodyClass')
    home
@stop

@section('main')
    @include('atomic.molecules.home.header')
    @include('atomic.organisms.event.list')
@stop

@section('footer')
    @include('atomic.molecules.footer')
@stop