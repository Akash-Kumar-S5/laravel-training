<?php

namespace App\DataTables;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class EmployeeWithOutSalaryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('employee_name', function ($data) {
                return $data->user->name;
            })
            ->addColumn('official_email', function ($data) {
                return $data->user->email;
            })
            ->addColumn('action', function ($data) {
                return view('salary.components.process_to_pay_action', ['data' => $data]);
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Employee $model): QueryBuilder
    {
        $currentDate = \Carbon\Carbon::now();
        return $model->newQuery()
            ->with('user')
            ->whereDoesntHave('salary')
            ->orWhereHas('salary', function ($query) use ($currentDate) {
                $query->whereYear('created_at', '!=', $currentDate->year)
                    ->orWhereMonth('created_at', '!=', $currentDate->month);
            });
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('employee-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            'id',
            'employee_name',
            'official_email',
            'action'
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'EmployeeWithOutSalary_' . date('YmdHis');
    }
}
