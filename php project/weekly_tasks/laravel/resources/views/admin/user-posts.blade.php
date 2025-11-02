@extends('layouts.admin-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                @foreach($userPosts as $post)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post -> post_name }}</h5>
                                <h6 class="card-subtitle text-muted">{{ auth()->user()->name }}</h6>
                                <img class="img-fluid d-flex mx-auto my-4"
                                     src="{{ asset('storage/' . $post->post_image) }}" alt="Card image cap">
                                <p class="card-text">{{$post->post_description}}</p>
                            </div>
                            <div class="card-links">
                                <div class="card-footer">
                                    <a href="{{ route('post.edit', $post->id ) }}" class="card-link">Edit</a>
                                    <a href="" onclick="event.preventDefault();
                                                     document.getElementById('delete-post-{{ $post->id }}').submit();"
                                       class="card-link">Delete</a>
                                    <form id="delete-post-{{ $post->id }}"
                                          action="{{ route('home.destroy', $post->id ) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            {{ $userPosts->links() }}
        </div>
    </div>
@endsection
