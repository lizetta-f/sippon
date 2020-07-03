@extends('base')

@section('title', $role->name)
@section('back_url', route('roles.index'))

@section('main')
    <h1>{{ $role->name }}</h1>
@endsection
