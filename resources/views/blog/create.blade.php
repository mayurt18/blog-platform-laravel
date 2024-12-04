@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Create a New Post</h1>
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" placeholder="Write your content here" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Save Post</button>
            </form>
        </div>
    </div>
</div>
@endsection
