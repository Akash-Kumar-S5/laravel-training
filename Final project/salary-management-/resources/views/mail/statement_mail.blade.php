<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="py-12">
        <p>Your Salary for this month is credited</p>
        <div class="card">
            <div class="card-header">
                <h1>{{ __('Employee Salary Statement ') }}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col mb-3">
                        <h5>Payment Date</h5>
                        <p>{{ now() }}</p>
                    </div>
                </div>
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
    <h5>Regards,</h5>
    <h3>Salary Management team</h3>
</div>
</body>
</html>
