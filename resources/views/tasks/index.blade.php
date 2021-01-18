@extends('layout')
@section('content')
<div class="container">

    <div class="row">
        <div class="col col-md-4">
            <nav class="card">
                <div class="card-footer">{{__('messages.folder') }}</div>
                <div class="card-body folder-button">
                    <a href="{{ route('folders.create') }}" class="btn page-link text-dark d-inline-block">
                        {{__('messages.add-folder') }}
                    </a>
                </div>
                <div class="list-group">
                    @foreach($folders as $folder)
                    <a href="{{ route('tasks.index', ['id'=>$folder->id]) }}"
                        class="list-group-item list-underbar-none {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                        {{ $folder->title }}
                    </a>
                    @endforeach
                </div>
            </nav>
        </div>

        <div class="column col-md-8">
            <div class="card">

                <div class="card-header">{{__('messages.task') }}</div>
                <div class="card-body">
                    <div class="text-center">
                        <a href="{{ route('tasks.create', ['id'=>$current_folder_id]) }}"
                            class="btn page-link text-dark d-inline-block">
                            {{__('messages.add-task') }}
                        </a>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>{{__('messages.title') }}</th>
                            <th>{{__('messages.status') }}</th>
                            <th>{{__('messages.limit') }}</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task -> title }}</td>
                            <td>
                                <span class="badge {{ $task -> status_class }}"> {{ __($task -> status_label) }}</span>
                            </td>
                            <td>{{ $task -> formatted_due_date }}</td>
                            <td>
                                <a
                                    href="{{ route('tasks.edit', ['id'=>$task->folder_id, 'task_id'=>$task->id]) }}">{{__('Edit')}}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
