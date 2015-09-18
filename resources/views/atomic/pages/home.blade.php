@extends('atomic.templates.base')

@section('pageTitle')
    Insert clever slogan here
@stop

@section('bodyClass')
    home
@stop

@section('navbar')
    @include('atomic.molecules.home.header')
@stop

@section('main')
    @include('atomic.atoms.home.title')
    @include('atomic.atoms.home.tagline')
    @include('atomic.organisms.event.list')
@stop

@section('footer')
    @include('atomic.molecules.footer')
@stop