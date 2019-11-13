<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>掲示板</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <header>
    <nav class="my-navbar">
      <a href="/" class="my-navbar-brand">掲示板</a>
    </nav>
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col col-md-4">
          <nav class="panel panel-default">投稿</nav>
          <div class="panel-body">
            <a href="#" class="btn btn-default btn-block">
              投稿する
            </a>
          </div>
          <div class="list-group">
            @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at }}</h6>
                <p class="card-text">{{ $post->content }}</p>
                <a href="#" class="card-link">リンク1</a>
                <a href="#" class="card-link">リンク2</a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>