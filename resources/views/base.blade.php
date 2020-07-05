<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- Стили: -->
    <link
        rel="stylesheet"
        type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous"
    >
    <!-- Сценарии: -->
    <script
        defer
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"
    ></script>
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"
    ></script>
    <script
        defer
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"
    ></script>
    <style media="screen">
        header, footer, div {
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="container-fluid px-0">
        <div class="row">
            <header class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <a class="navbar-brand" href="#">Блог</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    {{-- <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('messages.index') }}">Сообщения</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}">Роли</a>
                      </li>
                    </ul> --}}
                  </div>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                   {{ Auth::user()->name }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  @if(View::hasSection('back_url'))
                      <a class="btn btn-outline-success" href="@yield('back_url')">Вернуться к списку</a>
                  @endif

                </nav>
            </header>
        </div>
        <div id="main" class="row">
            <div class="col-4 border-right">
                <div class="list-group list-group-flush">
                  <a href="{{ route('messages.index') }}" class="list-group-item list-group-item-action">Сообщения</a>
                  <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action">Роли</a>
                </div>
            </div>
            <div class="col-8">
                <article>
                    @yield('main')
                    @if ($errors->count())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $e)
                                {{ $e }}
                            @endforeach
                        </div>
                    @endif
                </article>
            </div>
        </div>
        <div class="row">
            <footer  class="col-12"></</footer>
        </div>
    </div>
</body>
</html>
