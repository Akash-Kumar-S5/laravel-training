<x-admin-layout>

    <div class="container-fluid">
        <div class="py-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Update employee')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('employee.update',$employee)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group mt-2">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{$employee->user->name}}"
                                   class="form-control">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">Personal Email</label>
                            <input type="email" id="email" name="email" value="{{$employee->email}}"
                                   class="form-control">
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="phone">Phone No</label>
                            <input type="tel" id="phone" name="phone" value="{{$employee->phone_number}}"
                                   class="form-control">
                            @error('phone')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="dob">Date of Birth</label>
                            <input type="date" id="dob" name="date_of_birth" value="{{$employee->date_of_birth}}"
                                   class="form-control">
                            @error('date_of_birth')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address">{{$employee->address}}</textarea>
                            @error('address')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="user_email">Official Email</label>
                            <input type="email" id="user_email" name="user_email" value="{{$employee->user->email}}"
                                   class="form-control" placeholder="official email">
                            @error('user_email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button class="btn btn-primary mt-2" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
