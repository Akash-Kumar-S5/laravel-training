<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="alert">
                @if(session('alert')=='success')
                    <x-alert-success :message="session('message')"></x-alert-success>
                @elseif(session('alert')=='failure')
                    <x-alert-success :message="session('message')"></x-alert-success>
                @endif
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-end py-2">
                    <a href="{{ route('admin.permissions.create') }}"
                       class="px-4 p-2 bg-blue-700 hover:bg-blue-500 rounded-md">Create Permission</a>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                permissions
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Delete & Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $permission->name }}
                                </th>
                                <td>
                                    <div class="flex justify-end">
                                        <div class="flex space-x-2">
                                            <a href="{{route('admin.permissions.edit',$permission)}}"
                                               class="px-4 p-2 bg-blue-700 hover:bg-blue-500 rounded-md">Edit</a>
                                            <button class="px-4 p-2 bg-red-700 hover:bg-red-500 rounded-md delete-btn"
                                                    data-permission-id="{{ $permission->id }}">Delete
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

<script>
    $(document).ready(function () {
        $('.delete-btn').on('click', function () {
            let button = $(this);
            let permissionId = button.data('permission-id');

            // Send an AJAX request to delete the permission
            $.ajax({
                url: '/admin/permissions/' + permissionId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log('Permission deleted successfully');
                    button.closest('tr').fadeOut(300, function () {
                        $(this).remove();
                    });
                    $('.alert').html('<div x-data="{open:true}" x-show="open" id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert"><svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 a9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/></svg><span class="sr-only">Info</span><div class="ml-3 text-sm font-medium">' + data.message + '</div><button @click="open = false" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close"><span class="sr-only">Close</span><svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg></button></div>');
                },
                error: function (error) {
                    console.error('Error deleting permission', error);
                }
            });
        });
    });
</script>
