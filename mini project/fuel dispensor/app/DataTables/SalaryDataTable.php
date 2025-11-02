<?php

namespace App\DataTables;

use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SalaryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('user_name', function ($data) {
                return $data->employee->user->name;
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('Y-m-d');
            })
            ->addColumn('action', function ($data) {
                return view('salary.components.action', ['data' => $data]);
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Salary $model): QueryBuilder
    {
        $currentMonth = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();


        return $model->newQuery()
            ->with('employee.user')
            ->whereBetween('created_at', [$currentMonth, $currentMonthEnd]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('salary-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(3 ,'asc');
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('employee_id')
                ->title('id'),
            'user_name',
            Column::make('net_salary')
                ->title('recharge amount'),
            Column::make('created_at')
                ->title('Assigned date'),
            'payment_status',
            'action'
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Salary_' . date('YmdHis');
    }
}
