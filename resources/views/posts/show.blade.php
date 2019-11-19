@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">投稿詳細</nav>
        <div class="list-group">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">名前: {{ $post->user->name }}</h6>
              <p class="card-text">{{ $post->content }}</p>
              <a href="{{ action('PostController@edit', $post->id) }}" class="card-link">編集</a>
              <a href="{{ action('PostController@delete',$post->id) }}" class="card-link">削除</a>
              <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at }}</h6>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">コメントする</div>
            <div class="panel-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $message)
                      <li>{{ $message }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{ route('comments.create') }}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                  <label for="title"> 内容</label>
                  <textarea class="form-control" name="comments" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
              </form>
            </div>
          </nav>
        </div>
        @foreach($post->comments as $comment)
          <div class="list-group">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h6 class="card-title">名前: {{ $comment->user->name }}</h6>
                <p class="card-text">{{ $comment->comments }}</p>
                <a href="{{ action('CommentController@edit', $comment->id) }}" class="card-link">編集</a>
                <a href="{{ action('CommentController@delete',$comment->id) }}" class="card-link">削除</a>
                <h6 class="card-subtitle mb-2 text-muted">{{ $comment->created_at }}</h6>
              </div>
            </div>
          </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $post->comments->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection