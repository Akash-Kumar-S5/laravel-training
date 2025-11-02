@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Blog') }}</div>
                    <div class="card-body">
                        <form action="/blog" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Blog Title</label>
                                <input type="text" name="title" class="form-control">
                                @if ($errors->has('title'))
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Blog Body</label>
                                <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                                @if ($errors->has('body'))
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('body') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Publish At</label>
                                <input type="date" name="published_at" class="form-control">
                                @if ($errors->has('published_at'))
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('published_at') }}</div>
                                @endif
                            </div>
                            <div style="margin-top: 20px;">
                                <a href="{{ route('blog.index') }}" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
