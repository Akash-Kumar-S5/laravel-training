<?php

namespace App\DataTables;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class EmployeeDataTable extends DataTable
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
                return $data->user->name; // Access the user's name from the eager-loaded user relationship
            })
            ->addColumn('email', function ($data) {
                return $data->user->email;
            })
            ->addColumn('action', function ($data) {
                return view('employee.components.action', ['data' => $data]);
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Employee $model): QueryBuilder
    {
        $searchQuery = $this->request->get('search_query');

        $model = $model->with('user');

        if ($searchQuery !== null) {

            $model = $model->where(function ($query) use ($searchQuery) {
                $query->whereHas('user', function ($userQuery) use ($searchQuery) {
                    $userQuery->where('name', 'like', '%' . $searchQuery . '%');
                })
                    ->orWhere('email', 'like', '%' . $searchQuery . '%')
                    ->orWhere('id', 'like', '%' . $searchQuery . '%')
                    ->orWhere('address', 'like', '%' . $searchQuery . '%');
            });

            return $this->applyScopes($model);
        }

        return $model->newQuery();
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
            ->orderBy(1);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            'id',
            'user_name',
            'email',
            'phone_number',
            'date_of_birth',
            'action'
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Employee_' . date('YmdHis');
    }
}
