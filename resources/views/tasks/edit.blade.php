@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
    <div class="container">
      <div class="col offset-md-3 col-md-6">
        <nav class="card">
          <div class="card-header">タスクを編集する</div>
            <div class="card-body">
              @if($errors-> any())
              <div class="alert alert-danger">
                @foreach ($errors->all() as $message)
                    <p>{{ $message }}</p>
                @endforeach
              </div>
              @endif
              <form action="{{ route('tasks.edit', ['id' => $task-> folder_id, 'task_id' => $task -> id]) }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $task->title }}"/>
              </div>
              <div class="form-group">
                <label for="status">状態</label>
                <select name="status" id="status" class="form-control">
                  @foreach (\App\Task::STATUS as $key => $val)
                  <option value="{{ $key }}" {{ $key == old('status', $task->status) ? 'selected' : ''}}>
                    {{ $val['label'] }}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="due_date">期限</label>
                <input type="text" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') ?? $task -> formatted_due_date }}"/>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
@endsection

@section('script')
    @include('share.flatpickr.scripts')
@endsection
