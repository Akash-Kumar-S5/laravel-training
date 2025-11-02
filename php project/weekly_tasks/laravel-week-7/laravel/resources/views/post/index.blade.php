<x-post-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-6">
            @foreach($posts as $post)
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="max-w-sm bg-white mb-5  border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <img class="rounded-t-lg" src="{{ asset('storage/' . $post->post_image) }}" alt=""/>
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->post_name }}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->post_description }}</p>
                            @if(auth()->user()->id == $post->user->id)
                                <div class="flex justify-end">
                                    <div class="flex space-x-2">
                                        @can('Edit Post')
                                            <a href="{{route('post.edit',$post)}}"
                                               class="px-4 p-2 bg-blue-700 hover:bg-blue-500 rounded-md">Edit</a>
                                        @endcan
                                        @can('Delete Post')
                                            <form class="px-4 p-2 bg-red-700 hover:bg-red-500 rounded-md"
                                                  action="{{route('post.destroy',$post)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-post-layout>
