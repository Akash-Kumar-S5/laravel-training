<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div>
 <div class="container-fluid">
        <div class="py-12">
            <div class="card">
                <div class="card-header">
                    <h3> Montly payment statement</h3>
                </div>
                <table class="table table-responsive table-bordered">
                    <thead>
                    <td>Employee Id</td>
                    <td>Employee Name</td>
                    <td>Payment Date And Time</td>
                    <td>Basic Salary</td>
                    <td>Allowance Description</td>
                    <td>Allowance Amount</td>
                    <td>Deduction Description</td>
                    <td>Deduction Amount</td>
                    <td>Net Salary</td>
                    </thead>
                    <tbody>
                    @foreach($salaries as $salary)
                        <tr>
                            <td>{{ $salary->employee_id }}</td>
                            <td>{{ $salary->employee->user->name }}</td>
                            <td>{{ $salary->updated_at }}</td>
                            <td>{{ $salary->basic_salary }}</td>
                            <td>{{ $salary->allowances_description }}</td>
                            <td>{{ $salary->allowances_amount }}</td>
                            <td>{{ $salary->deductions_description }}</td>
                            <td>{{ $salary->deductions_amount }}</td>
                            <td>{{ $salary->net_salary }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <h5>Regards,</h5>
        <h3>Salary Management team</h3>
    </div>
</div>
</body>
</html>
