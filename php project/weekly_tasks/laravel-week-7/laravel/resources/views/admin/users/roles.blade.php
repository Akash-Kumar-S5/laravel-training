<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('alert')=='failure')
                <x-alert-success :message="session('message')"></x-alert-success>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex py-2">
                    <a href="{{ url()->previous() }}" class="px-4 p-2 bg-blue-700 hover:bg-blue-500 rounded-md">Go
                        Back</a>
                </div>

                <div class="flex flex-col">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="mt-4 text-gray-900 dark:text-gray-100">
                               UserName : {{ $user->name }}
                            </div>
                            <div class="mb-4 text-gray-900 dark:text-gray-100">
                                UserEmail : {{ $user->email }}
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.users.assignRole',$user) }}" method="post">
                        @csrf
                        @method('put')
                        @foreach($allRoles as $roles)
                            <div class="mb-3">
                                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                    <input type="checkbox" name="roles[]" value="{{ $roles->name }}" class="sr-only peer" @if(in_array($roles->name,$rolesInUser)) checked @endif>
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span
                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $roles->name }}</span>
                                </label>
                            </div>
                        @endforeach
                        <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Assign role
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
