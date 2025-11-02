<x-admin-layout>
    <div class="container-fluid">
        <div class="py-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('User Details ') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-3">
                            <h5> Id </h5>
                            <p>{{$employee->id }}</p>
                        </div>
                        <div class="col mb-3">
                            <h5> Name </h5>
                            <p>{{$employee->user->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <h5> Email </h5>
                            <p>{{$employee->email }}</p>
                        </div>
                        <div class="col mb-3">
                            <h5> Phone Number </h5>
                            <p>{{$employee->phone_number }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <h5> Date Of Birth </h5>
                            <p>{{$employee->date_of_birth }}</p>
                        </div>
                        <div class="col mb-3">
                            <h5> Valid From </h5>
                            <p>{{$employee->created_at }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" mb-3">
                            <h5> Address </h5>
                            <p>{{$employee->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @role('admin')
        <div class="py-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Payment History</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Payment Date and Time</th>
                                <th>Amount</th>
                                <th>payment status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employee->salary as $salary)
                                <tr>
                                    <td>{{ $salary->updated_at }}</td>
                                    <td>{{ $salary->basic_salary }}</td>
                                    <td>{{ $salary->payment_status }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @endrole
    </div>

</x-admin-layout>
