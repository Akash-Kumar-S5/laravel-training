<x-admin-layout>

    <div class="container-fluid">
        <div class="py-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Create a new User') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">{{ __('Phone No') }}</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control">
                            @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">{{ __('Date of Birth') }}</label>
                            <input type="date" id="dob" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control">
                            @error('date_of_birth')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">{{ __('Address') }}</label>
                            <textarea class="form-control" id="address" name="address">{{ old('address') }}</textarea>
                            @error('address')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="user_email" class="form-label">{{ __('Official Email') }}</label>
                            <input type="email" id="user_email" name="user_email" value="{{ old('user_email') }}" class="form-control" placeholder="{{ __('Official email') }}">
                            @error('user_email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="{{ __('Temporary password (1-8)') }}">
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
