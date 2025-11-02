<!-- resources/views/employees/actions.blade.php -->
<div class="flex space-x-2">
    <form action="{{ route('salary.create') }}" method="get">
        @csrf
        <!-- Include the employee_id as a hidden input field -->
        <input type="hidden" name="recharge_id" value="{{ $data->id }}">

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-sm">Recharge</button>
    </form>
</div>
