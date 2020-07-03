@extends('base')

@section('title', $message->title)
@section('back_url', route('messages.index'))

@section('main')
    <h1>{{ $message->title }}</h1>

    {{ $message->content }}
@endsection
