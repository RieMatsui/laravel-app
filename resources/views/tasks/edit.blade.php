@extends('layout')

@section('content')
<div class="container">
    <div class="col offset-md-3 col-md-6">
        <nav class="card">
            <div class="card-header">{{__('messages.edit-task')}}</div>
            <div class="card-body">
                @if($errors-> any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $message)
                    <p>{{ __($message) }}</p>
                    @endforeach
                </div>
                @endif

                <form action="{{ route('tasks.edit', ['id' => $task-> folder_id, 'task_id' => $task -> id]) }}"
                    method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="label-form" for="title">{{ __('messages.title') }}</label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ old('title') ?? $task->title }}" />
                    </div>

                    <div class="form-group">
                        <label class="label-form" for="status">{{__('messages.status') }}</label>
                        <select name="status" id="status" class="form-control">
                            @foreach (\App\Task::STATUS as $key => $val)
                            <option value="{{ $key }}" {{ $key == old('status', $task->status) ? 'selected' : ''}}>
                                {{ __($val['label']) }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="label-form" for="due_date">{{__('messages.limit') }}</label>
                        <input type="text" class="form-control" name="due_date" id="due_date"
                            value="{{ old('due_date') ?? $task -> formatted_due_date }}" />
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">{{__('messages.send') }}</button>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</div>
@endsection

@section('scripts')
@include('share.flatpickr.scripts')
@endsection
