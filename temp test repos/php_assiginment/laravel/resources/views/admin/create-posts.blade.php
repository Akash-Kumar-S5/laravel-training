@extends('layouts.admin-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">New Post</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="title">Title</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-font"></i></span>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"
                                       aria-label="Title">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-pencil"></i></span>
                                <textarea id="description" class="form-control" name="description"
                                          placeholder="Enter Description" aria-label="Description"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="image">Image</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-image"></i></span>
                                <input type="file" id="image" class="form-control" name="image" accept="image/*"
                                       aria-label="Image">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
