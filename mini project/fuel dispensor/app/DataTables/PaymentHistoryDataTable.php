<?php

namespace App\DataTables;

use App\Models\Salary;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Options\Plugins\Buttons;
use Yajra\DataTables\Services\DataTable;

class PaymentHistoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->format('Y-m-d');
            })
            ->addColumn('action', 'salary.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Salary $model): QueryBuilder
    {
        $userId = Auth::id();

        return $model->newQuery()
            ->with('employee.user')
            ->where('payment_status', 'success')
            ->whereHas('employee.user', function ($query) use ($userId) {
                $query->where('id', $userId);
            });
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
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons([
                Button::make('pdf')->className('btn btn-primary')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('updated_at')
                ->title('payed date'),
            'basic_salary',
            'allowances_description',
            'allowances_amount',
            'deductions_description',
            'deductions_amount',
            'net_salary'
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PaymentHistory_' . date('YmdHis');
    }
}
