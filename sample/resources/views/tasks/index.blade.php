<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>To do App</title>
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
      <div class="row">
        <div class="col col-md-4">
          <nav class="card">
            <div class="card-footer">フォルダ</div>
            <div class="card-body folder-button">
              <a href="#" class="btn page-link text-dark d-inline-block">
                フォルダを追加する
              </a>
            </div>

            <div class="list-group">
                @foreach($folders as $folder)
                <a href="{{ route('tasks.index', ['id' => $folder->id]) }}" 
                  class="list-group-item list-underbar-none {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                  {{ $folder->title }}
                </a>
              @endforeach
            </div>
          </nav>
        </div>

        <div class="column col-md-8">

          <div class="card">
            <div class="card-header">タスク</div>
            <div class="card-body">
              <div class="text-center">
                <a href="#" class="btn page-link text-dark d-inline-block">
                  タスクを追加する
                </a>
              </div>
            </div>

            <table class="table">
              <thead>
                <tr>
                  <th>タイトル</th>
                  <th>状態</th>
                  <th>期限</th>
                  <th></th>
                </tr>
              </thead>
              
              <tbody>
                @foreach ($tasks as $task)
                <tr>
                  <td>{{ $task -> title }}</td>
                  <td>
                    <span class="label"> {{ $task -> status }}</span>
                  </td>
                  <td>{{ $task -> due_date }}</td>
                  <td><a href="#">編集</a></td>
                </tr>
                @endforeach
              </tbody>

          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
