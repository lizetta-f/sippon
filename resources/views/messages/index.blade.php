@extends('base')

@section('title', 'Перечень записей в блоге')

@section('main')
    <h1>Перечень записей в блоге</h1>

    <a href="{{ route('messages.create') }}">Добавить</a>

    <div class="table-responsive">
      <table class="table table-hover table-striped">
        <thead class="thead-inverse">
          <tr>
            <th>Идентификатор</th>
            <th>Заголовок</th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>

            @foreach ($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->title }}</td>
                    <td>
                        @can('update', $message)
                        <a href="{{ route('messages.edit', $message->id) }}">
                            Изменить
                        </a>
                        @endcan
                    </td>
                    <td>
                        @can('delete', $message)
                        <a href="{{ route('messages.remove', $message->id) }}">
                            Удалить
                        </a>
                        @endcan
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>
    </div>
@endsection
