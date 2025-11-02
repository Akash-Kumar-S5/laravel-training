<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeWithOutSalaryDataTable;
use App\DataTables\PaymentHistoryDataTable;
use App\DataTables\SalaryDataTable;
use App\Http\Requests\Salary\SalaryRequest;
use App\Jobs\GeneratePayJob;
use App\Models\Salary;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SalaryDataTable $dataTable)
    {
        return $dataTable->render('salary.index');
    }

    public function employeesWithoutSalary(EmployeeWithOutSalaryDataTable $dataTable)
    {
        return $dataTable->render('salary.employees_without_salary');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee_id = \request('employee_id');
        return view('salary.create', compact('employee_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalaryRequest $request, $employee_id)
    {
        try {
            Salary::create([
                'employee_id' => $employee_id,
                'basic_salary' => $request->basic_salary,
                'allowances_description' => $request->allowances_description,
                'allowances_amount' => $request->allowances_amount,
                'deductions_description' => $request->deductions_description,
                'deductions_amount' => $request->deductions_amount,
                'net_salary' => ($request->basic_salary + $request->allowances_amount - $request->deductions_amount),
            ]);
            return to_route("salary.not.assigned");

        } catch (\Exception $e) {
            return to_route("salary.not.assigned")->with("failed", "Failed to assign salary");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        $salary->with('employee.user');
        return view("salary.show", compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        return view('salary.edit', compact('salary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalaryRequest $request, Salary $salary)
    {
        try {
            $salary->update([
                'basic_salary' => $request->basic_salary,
                'allowances_description' => $request->allowances_description,
                'allowances_amount' => $request->allowances_amount,
                'deductions_description' => $request->deductions_description,
                'deductions' => $request->deductions,
                'net_salary' => ($request->basic_salary + $request->allowances_amount - $request->deductions_amount),
            ]);

            return to_route('salary.index')->with("success", "Salary edited successfully");
        } catch (\Exception $e) {
            return to_route("salary.index")->with("failed", "Failed to update salary");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        try {
            $salary->delete();
            return redirect()->back()->with("success", "salary deleted successfully");
        } catch (\Throwable $e) {
            return redirect()->back()->with("failed", "some thing went wrong");
        }
    }

    /**
     * @param Salary $salary
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generatePay(Salary $salary)
    {
        try {
            GeneratePayJob::dispatch($salary);
            $salary->update(['payment_status' => 'pending']);
            return redirect()->back()->with("success", "Payment process successfully completed");
        } catch (\Throwable $e) {
            return redirect()->back()->with("failed", "some thing went wrong");
        }
    }

    public function paymentHistory(PaymentHistoryDataTable $dataTable)
    {
        return $dataTable
            ->render('salary.index');
    }
}
