@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col offset-md-3 col-md-6">
                <nav class="card">
                    <div class="card-header">
                        まずはフォルダを作成しましょう
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ route('folders.create') }}" class="btn btn-primary">
                            フォルダ作成ページへ
                        </a>
                        </div>
                    </div>
                <nav>
            </div>
        </div>
    </div>

@endsection
