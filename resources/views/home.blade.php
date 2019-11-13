@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">
            投稿しよう
          </div>
          <div class="panel-body">
            <div class="text-center">
              <a href="{{ route('posts.create') }}" class="btn btn-primary">
                投稿作成ページへ
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection