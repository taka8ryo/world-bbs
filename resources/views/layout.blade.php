<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  @yield('styles')
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">掲示板</a>
    <div class="my-navbar-control">
      @if(Auth::check())
        <a class="my-navbar-item" href="{{ route('change.name') }}">ようこそ、{{ Auth::user()->name }}さん</span>
        |
        <a class="my-navbar-item" href="{{route('posts.create')}}">投稿</a>
        |
        <a class="my-navbar-item" href="{{route('posts.index')}}">投稿一覧</a>
        |
        <a class="my-navbar-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>
        <form id ="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @else
        <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
        |
        <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
      @endif
    </div>
  </nav>
</header>
<main>
  @yield('content')
</main>
@yield('scripts')
</body>
</html>