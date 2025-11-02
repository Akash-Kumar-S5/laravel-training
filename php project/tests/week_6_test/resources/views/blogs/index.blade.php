@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-12">
                <a href="blog/create" class="btn btn-primary mb-2">Create Blog</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Published At</th>
                        <th>Created at</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($blogs as $key => $blog)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ date('d-m-Y', strtotime($blog->published_at)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($blog->created_at)) }}</td>
                            <td>
                                <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('blog.destroy', $blog->id) }}" method="post" class="d-inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
