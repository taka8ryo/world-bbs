@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">投稿一覧</nav>
        <div class="panel-body">
          <a href="{{ route('posts.create') }}" class="btn btn-default btn-block">
            投稿する
          </a>
        </div>
          <div class="panel-body">
            <a href="{{ route('posts.search') }}" class="btn btn-default btn-block">
              検索する
            </a>
          </div>
        @foreach($posts as $post)
          <div class="list-group">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">名前: {{ $post->user->name }}</h6>
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ action('PostController@edit', $post->id) }}" class="card-link">編集</a>
                <a href="{{ action('PostController@delete',$post->id) }}" class="card-link">削除</a>
                <a href="{{ action('PostController@show', $post->id) }}">
                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at }}</h6>
                </a>
              </div>
            </div>
          </div>
        @endforeach
        <div class="d-flex justify-content-center">
          {{ $posts->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection