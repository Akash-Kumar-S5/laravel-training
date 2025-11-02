@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('View Blog') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h3>{{ $blog->user->name }}</h3>
                        <h2>{{ $blog->title }}</h2>
                        <p>Published At: {{ date('Y-m-d', strtotime($blog->published_at)) }}</p>
                        <br>
                        <div>
                            {{ $blog->body }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
