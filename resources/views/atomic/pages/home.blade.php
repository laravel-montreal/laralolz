@extends('atomic.templates.home')

@section('pageTitle')
    Insert clever slogan here
@stop

@section('bodyClass')
    home
@stop

@section('main')
    @include('atomic.organisms.header')
    @include('atomic.organisms.event.list')
@stop

@section('footer')
    @include('atomic.organisms.footer')
@stop