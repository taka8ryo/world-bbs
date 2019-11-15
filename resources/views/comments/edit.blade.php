@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">コメントを編集する</div>
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
            <form action="{{ route('comments.edit', ['id' => $comment]) }}" method="post">
              @csrf
              <div class="form-group">
                <label for="title"> 内容</label>
                <textarea class="form-control" name="comments" id="comments" cols="30" rows="10">{{ old('content') ?? $comment->comments }}</textarea>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection