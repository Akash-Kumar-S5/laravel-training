<x-admin-layout>

    <div class="container-fluid">
        <div class="py-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Employee Salary Details ') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-3">
                            <h5>Employee Id </h5>
                            <p>{{$salary->employee->id }}</p>
                        </div>
                        <div class="col mb-3">
                            <h5>Employee Name </h5>
                            <p>{{$salary->employee->user->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <h5>Allowance Description</h5>
                            <p>{{$salary->allowances_description  }}</p>
                        </div>
                        <div class="col mb-3">
                            <h5>Allowance Amount</h5>
                            <p>{{$salary->allowances_amount }}</p>
                        </div>
                    </div>
                   <div class="row">
                       <div class=" col mb-3">
                           <h5>Deduction Description</h5>
                           <p>{{$salary->deductions_description  }}</p>
                       </div>
                       <div class="col mb-3">
                           <h5>Deduction Amount</h5>
                           <p>{{$salary->deductions_amount }}</p>
                       </div>
                   </div>
                    <div class="row">
                        <div class="col mb-3">
                            <h5>Basic Salary </h5>
                            <p>{{$salary->basic_salary }}</p>
                        </div>
                        <div class="col mb-3">
                            <h5>Net Salary </h5>
                            <p>{{$salary->net_salary }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
