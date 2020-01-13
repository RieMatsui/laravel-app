@extends('layout')

@section('content')
<div class="row">
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
            <label class="label-form" for="tile">フォルダ名</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old ('title') }}" />
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">送信</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
