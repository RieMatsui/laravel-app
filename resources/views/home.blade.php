@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col offset-md-3 col-md-6">
            <nav class="card">
                <div class="card-header">{{ __('messages.create-a-folder-first') }}</div>
                <div class="card-body">
                    <div class="text-center">
                        <a href="{{ route('folders.create') }}"
                            class="btn btn-primary">{{ __('messages.go-to-folder-creation-page') }}</a>
                    </div>
                </div>
                <nav>
        </div>
    </div>
</div>
@endsection
