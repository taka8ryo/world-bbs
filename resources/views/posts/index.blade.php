@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">投稿</nav>
        <div class="panel-body">
          <a href="{{ route('posts.create') }}" class="btn btn-default btn-block">
            投稿する
          </a>
        </div>
        <div class="list-group">
          @foreach($posts as $post)
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <a href="{{ action('PostController@show', $post->id) }}">
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at }}</h6>
              </a>
              <p class="card-text">{{ $post->content }}</p>
              <a href="{{ action('PostController@edit', $post->id) }}" class="card-link">編集</a>
              <a href="#" class="card-link">リンク2</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection