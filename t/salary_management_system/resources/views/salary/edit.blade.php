<x-admin-layout>

    <div class="container-fluid">
        <div class="py-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Update Salary for Employee') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('salary.update', $salary) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="basic_salary" class="form-label">{{ __('Basic Salary') }}</label>
                            <input type="number" id="basic_salary" name="basic_salary" value="{{$salary->basic_salary }}" class="form-control">
                            @error('basic_salary')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="allowances_description" class="form-label">{{ __('Allowances Description') }}</label>
                            <textarea class="form-control" placeholder="rent-1000, bonus-2000" id="allowances_description" name="allowances_description">{{$salary->allowances_description }}</textarea>
                            @error('allowances_description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="allowances_amount" class="form-label">{{ __('Allowances amount') }}</label>
                            <input type="number" id="allowances_amount" name="allowances_amount" value="{{$salary->allowances_amount }}" class="form-control">
                            @error('allowances_amount')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deductions_description" class="form-label">{{ __('Deductions Description') }}</label>
                            <textarea class="form-control" id="deductions_description" placeholder="pf-2500, dayOff-3days-1500" name="deductions_description">{{$salary->deductions_description }}</textarea>
                            @error('deductions_description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deductions_amount" class="form-label">{{ __('Deductions amount') }}</label>
                            <input type="number" id="deductions_amount" name="deductions_amount" value="{{$salary->deductions_amount }}" class="form-control">
                            @error('deductions_amount')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('update salary') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
