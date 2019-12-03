@extends('layout')

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col offset-md-3 col-md-6">
        <nav class="card">
          <div class="card-header">タスクを追加する</div>
          <div class="card-body">
            @if($errors -> any())
              @foreach ($errors->all as $messge)
                <p>{{ $message }}</p>
              @endforeach
          </div>
          @endif
          <form action="{{ route('tasks.create', ['id' => $folder_id])  }}" method="POST">
            @csrf
            <div class="form-group">
              <label for ="title">タイトル</label>
              <input typoe="text" class="form-control" name="title" id="title" value="{{ old('title') }}"/>
            </div>
            <div class="form-group">
              <label for="due_date">期限</label>
              <input type="text" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}"/>
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-primary">送信</button>
            </div>
          </form>
        </nav>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
  <script src="/js/task.js"></script>
@endsection
