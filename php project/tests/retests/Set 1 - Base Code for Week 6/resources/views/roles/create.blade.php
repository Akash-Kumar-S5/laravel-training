@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Role') }}</div>
                <div class="card-body">
                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Roll Name</label>
                            <input type="text" name="name" class="form-control">
                            @if ($errors->has('name'))
                            <div class="text-danger"
                                 style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="permission">Permissions</label><br>
                            <input type="checkbox" name="permissions[]" id="permission" value="Blog Read" > Blog Read<br>
                            <input type="checkbox" name="permissions[]" id="permission" value="Blog Read and Write" > Blog Read and write <br>
                            <input type="checkbox" name="permissions[]" id="permission" value="User profile Read" > User profile Read <br>
                            <input type="checkbox" name="permissions[]" id="permission" value="User profile Read and Write" > User profile Read and Write
                        </div>
                        <div style="margin-top: 20px;">
                            <a href="{{ route('user.index') }}" class="btn btn-primary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
