<!-- resources/views/users/actions.blade.php -->
<div class="flex space-x-2">
    <a href="{{ route('user.show', $data->id) }}" class="btn btn-primary btn-sm">pay history</a>
    <a href="{{ route('user.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
    <form action="{{ route('user.destroy', $data->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete this user?')">Delete
        </button>
    </form>
</div>
