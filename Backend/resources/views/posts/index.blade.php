@extends('layouts.app')
@section('content')
    <!-- Create Button -->
    <div class="text-center mb-4">
    <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
    </div>

    <!-- Table -->
    <table class="table align-middle">
    <thead>
        <tr>
        <th>#</th>
        <th>Title</th>
        <th>Posted By</th>
        <th>Created At</th>
        <th>Actions</th>
        </tr>
    </thead>

    <tbody>

@forelse($posts as $post)
    <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['posted_by']}}</td>
        <td>{{$post['created_at']}}</td>
        <td>
            <a href="{{route('posts.show' , $post['id'])}}" class="btn btn-info btn-sm">View</a>
            <a href="{{route('posts.edit' , $post['id'])}}" class="btn btn-primary btn-sm">Edit</a>
            <form  style="display: inline" action="{{route('posts.destroy' , $post['id'])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
        </tr>
@empty
<tr>
@endforelse
    </tbody>
  </table>
@endsection('content')
