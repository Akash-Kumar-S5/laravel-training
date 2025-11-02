<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert></x-alert>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="card-header">
                                <div class="head-label text-center">
                                    <h5 class="card-title mb-0">Employee Records</h5>
                                </div>
                                <div class="dt-action-buttons text-end">

                                    <a href="{{ route('employee.create') }}"
                                       class="dt-button create-new btn btn-primary" tabindex="0"
                                       aria-controls="DataTables_Table_0">
                                        <i class="bx bx-plus me-1"></i>
                                        <span class="d-none d-lg-inline-block">Add New Record</span>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! $dataTable->table() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

{!! $dataTable->scripts() !!}
