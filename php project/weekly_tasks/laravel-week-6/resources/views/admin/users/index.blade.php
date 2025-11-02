<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('alert')=='success')
                <x-alert-success :message="session('message')"></x-alert-success>
            @elseif(session('alert')=='failure')
                <x-alert-success :message="session('message')"></x-alert-success>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                users
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit & Delete</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->name }}
                                </th>
                                <td>
                                    <div class="flex justify-end">
                                        <div class="flex space-x-2">
                                            <a href="{{route('admin.users.roles',$user)}}"
                                               class="px-4 p-2 bg-blue-700 hover:bg-blue-500 rounded-md">Assign Roles</a>
                                            <form class="px-4 p-2 bg-red-700 hover:bg-red-500 rounded-md" action="{{route('admin.users.destroy',$user)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" >Delete</button>
                                            </form>
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
