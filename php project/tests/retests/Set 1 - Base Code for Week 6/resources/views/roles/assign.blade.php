@extends('layouts.app')

@section('content')
    <main>
        <div class="justify-content-center">
        <a href="{{ route('role.create') }}" class="btn btn-primary mb-2">Create Role</a>
        <a href="{{ route('role.index') }}" class="btn btn-primary mb-2">view Roles</a>
        </div>

        <br>
        <div class="container d-flex justify-content-center " style="margin-top:70px">
            <form method="post" action="{{ route('roles.assign') }}" class="mx-auto " style="width: 400px; padding:60px; padding-top:20px; background-color: #FFFFFF">
                @csrf
                <h2 style=" margin-bottom: 30px;">Assign Roles to User</h2>
                <div class="form-group" style="margin-bottom: 20px">
                    <label for="userid">User</label>
                    <input type="text" class="form-control" id="userid" name="userid" required>
                </div>
                <div class="form-group" style="margin-bottom: 20px">
                    <label for="role">Select Roles</label>
                    <select class="form-control" id="role" name="role" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assign Roles</button>
            </form>
        </div>
    </main>
@endsection
