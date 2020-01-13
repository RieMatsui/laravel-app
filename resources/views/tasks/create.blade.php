@extends('layout')

@section('styles')
@include('share.flatpickr.styles')
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col offset-md-3 col-md-6">
      <nav class="card">
        <div class="card-header">タスクを追加する</div>
        <div class="card-body">
          @if($errors -> any())
          <div class="list-group-item list-group-item-danger">
            @foreach ($errors->all() as $message)
            <p>{{ $message }}</p>
            @endforeach
          </div>
          @endif

          <form action="{{ route('tasks.create', ['id' => $folder_id])  }}" method="POST">
            @csrf
            <div class="form-group">
              <label class="label-form" for="title">タイトル</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
            </div>

            <div class="form-group">
              <label class="label-form" for="due_date">期限</label>
              <flat-pickr name="due_date" id="due_date" v-model="date" :config="config" class="form-control"
                placeholder="Select date" value="{{ old('due_date') }}">
              </flat-pickr>
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

@section('scripts')
@include('share.flatpickr.scripts')
@endsection
