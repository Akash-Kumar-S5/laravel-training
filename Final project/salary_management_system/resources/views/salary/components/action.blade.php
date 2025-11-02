<!-- resources/views/employees/actions.blade.php -->
<div class="flex space-x-2">
    @if($data->payment_status == 'not initiated')
        <form action="{{ route('salary.generate-pay', $data->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-success btn-sm"
                    onclick="return confirm('Are you sure you want to process this pay?')">GeneratePay
            </button>
        </form>
    @endif
    <a href="{{ route('salary.show', $data->id) }}" class="btn btn-primary btn-sm">show</a>
    @if($data->payment_status == 'not initiated')
        <a href="{{ route('salary.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
        <form action="{{ route('salary.destroy', $data->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Are you sure you want to delete this record?')">Delete
            </button>
        </form>
    @endif
</div>
