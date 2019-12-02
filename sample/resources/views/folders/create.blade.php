<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <header>
      <nav class="my-navbar">
          <a class="my-navbar-brand" href="/">ToDo App</a>
      </nav>
  </header>
  <main>
    <div class="container">
      <div class= "row">
          <div class="col offset-md-3 col-md-6 justify-content-center">
            <div class="card">
              <div class="card-header">
                  フォルダを追加する
              </div>
              <div class="card-body">
                @if ($errors -> any())
                <div>
                  <ul class="list-group">
                    @foreach ($errors -> all() as $message)
                  <li class="list-group-item list-group-item-danger">{{ $message }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                <form action="{{ route('folders.create')  }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="tile">フォルダ名</label>
                  <input type="text" class="form-control" name="title" id="title" value="{{ old ('title') }}"/>
                  </div>
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">送信</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
  </main>
</body>
</html>
