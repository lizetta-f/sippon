@extends('base')

@section('title', 'Удаление записи из блога')
@section('back_url', route('messages.index'))

@section('main')
    <h1>Удаление записи из блога</h1>

    <form action="{{ route('messages.destroy', $message->id) }}" method="post">
        @csrf

        @method('delete')

        <input type="submit" class="btn btn-block btn-success">
    </form>
@endsection
