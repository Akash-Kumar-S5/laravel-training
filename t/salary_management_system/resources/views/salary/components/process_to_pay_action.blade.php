<!-- resources/views/employees/actions.blade.php -->
<div class="flex space-x-2">
    <a href="{{ route('salary.create', ['employee_id' => $data->id]) }}" class="btn btn-primary btn-sm">Assign salary</a>
</div>
