@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Blog') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert" style="margin-top: 10px; margin-bottom: 10px;">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('blog.update', $blog->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Blog Title</label>
                                <input type="text" name="title" class="form-control" value="{{$blog->title}}">
                                @if ($errors->has('title'))
                                    <div class="text-danger" style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Blog Body</label>
                                <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$blog->body}}</textarea>
                                @if ($errors->has('body'))
                                    <div class="text-danger" style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('body') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Publish At</label>
                                <input type="date" name="published_at" class="form-control" value="{{ date('Y-m-d', strtotime($blog->published_at)) }}">
                            </div>
                            <div style="margin-top: 20px;">
                                <a href="{{ route('blog.index') }}" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
