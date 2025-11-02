<x-admin-layout>

    <div class="container-fluid">
        <div class="py-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Recharge for Users') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('salary.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="basic_salary" class="form-label">{{ __('Amount') }}</label>
                            <input type="hidden" name="employee_id" value="{{ $recharge_id }}">
                            <input type="number" id="basic_salary" name="amount" value="{{ old('basic_salary') }}" class="form-control">
                            @error('amount')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
{{--                        <div class="mb-3">--}}
{{--                            <label for="allowances_description" class="form-label">{{ __('Allowances Description') }}</label>--}}
{{--                            <textarea class="form-control" placeholder="rent-1000, bonus-2000" id="allowances_description" name="allowances_description">{{ old('allowances_description') }}</textarea>--}}
{{--                            @error('allowances_description')--}}
{{--                            <p class="text-danger">{{ $message }}</p>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="allowances_amount" class="form-label">{{ __('Phone number') }}</label>--}}
{{--                            <input type="number" id="allowances_amount" name="allowances_amount" value="{{ old('allowances_amount') }}" class="form-control">--}}
{{--                            @error('allowances_amount')--}}
{{--                            <p class="text-danger">{{ $message }}</p>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="deductions_description" class="form-label">{{ __('Deductions Description') }}</label>--}}
{{--                            <textarea class="form-control" id="deductions_description" placeholder="pf-2500, dayOff-3days-1500" name="deductions_description">{{ old('deductions_description') }}</textarea>--}}
{{--                            @error('deductions_description')--}}
{{--                            <p class="text-danger">{{ $message }}</p>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="deductions_amount" class="form-label">{{ __('Deduction amount') }}</label>--}}
{{--                            <input type="number" id="deductions_amount" name="deductions_amount" value="{{ old('deductions_amount') }}" class="form-control">--}}
{{--                            @error('deductions_amount')--}}
{{--                            <p class="text-danger">{{ $message }}</p>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('Recharge') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
