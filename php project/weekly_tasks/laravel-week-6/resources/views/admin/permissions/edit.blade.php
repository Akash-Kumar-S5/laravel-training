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
                    <form action="{{ route('admin.permissions.update',$permission) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission name</label>
                            <input type="text" id="name" name="name"
                                   value="{{ $permission->name }}"
                                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                   placeholder="eg: create ,edit" required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update permission
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
