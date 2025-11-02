@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Blog') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert"
                                 style="margin-top: 10px; margin-bottom: 10px;">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="/user/{{$user->id}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for=""> User Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                @if ($errors->has('name'))
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">User Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                @if ($errors->has('email'))
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div style="margin-top: 20px;">
                                <a href="{{ route('user.index') }}" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
