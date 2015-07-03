@extends('atomic.templates.base')

@section('pageTitle')
    Insert clever slogan here
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