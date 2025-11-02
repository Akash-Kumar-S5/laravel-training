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
                    <form action="{{ route('admin.roles.store') }}" method="post">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roll
                                Name</label>
                            <input type="text" id="name" name="name"
                                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                   placeholder="Admin" required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        @foreach($allPermissions as $permissions)
                            <div class="mb-3">
                                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                    <input type="checkbox" name="permissions[]" value="{{ $permissions->name }}" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span
                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $permissions->name }}</span>
                                </label>
                            </div>
                        @endforeach
                        <x-input-error :messages="$errors->get('permissions')" class="mt-2" />
                        <button type="submit"
                                class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            create role
                        </button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</x-admin-layout>
