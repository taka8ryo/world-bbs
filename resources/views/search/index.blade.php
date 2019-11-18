@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">投稿検索</nav>
        <div class="panel-body">
          <a href="{{ route('posts.create') }}" class="btn btn-default btn-block">
            投稿する
          </a>
        </div>
          <div class="panel-body">
              <div class="row">
                  <div class="col col-md-4">
                    <form action="{{ route('posts.search')}}" method="GET">
                      <div class="form-group">
                        <input type="text" name="keyword" class="form-controll">
                      </div>
                      <input type="submit" value="検索" class="btn btn-info">
                    </form>
                  </div>
          </div>
        @foreach($data as $post)
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
            {{ $data->appends(Request::only('keyword'))->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection