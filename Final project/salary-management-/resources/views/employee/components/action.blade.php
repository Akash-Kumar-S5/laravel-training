<!-- resources/views/employees/actions.blade.php -->
<div class="flex space-x-2">
    <a href="{{ route('employee.show', $data->id) }}" class="btn btn-primary btn-sm">pay history</a>
    <a href="{{ route('employee.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
    <form action="{{ route('employee.destroy', $data->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete this employee?')">Delete
        </button>
    </form>
</div>
