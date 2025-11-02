<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('admin.home');
    }

    /**
     * Display the search results
     */
    public function search(Request $request, EmployeeDataTable $dataTable)
    {
        return $dataTable->render('admin.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->user_email,
                'password' => Hash::make($request->password)
            ])->assignRole('employee');

            $employee = new Employee([
                'email' => $request->email,
                'phone_number' => $request->phone,
                'date_of_birth' => $request->input('date_of_birth'),
                'address' => $request->address,
            ]);

            $user->employee()->save($employee);

            return to_route("employee.index")->with("success", "Employee Created Successfully");
        } catch (\Exception $e) {
            return to_route("employee.index")->with("error", "Failed to create employee");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load(['salary' => function ($query) {
            $query->where('payment_status', 'success');
        }]);
        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.update', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try {
            $employee->user->update([
                'name' => $request->name,
                'email' => $request->user_email
            ]);

            $employee->update([
                'email' => $request->email,
                'phone_number' => $request->phone,
                'date_of_birth' => $request->input('date_of_birth'),
                'address' => $request->address,
            ]);

            return to_route("employee.index")->with("success", "Employee Updated Successfully");
        } catch (\Throwable $e) {
            return to_route("employee.index")->with('failed', 'some thing went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();

            return redirect()->back()->with("success", "Employee deleted Successfully");
        } catch (\Throwable $e) {
            return redirect()->back()->with("failed", "some thing went wrong");
        }
    }
}
