@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Manage Posts</h5>
                    <p class="card-text">Edit, update, or delete blog posts.</p>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Go to Posts</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Manage Comments</h5>
                    <p class="card-text">Review and manage user comments.</p>
                    <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">Go to Comments</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
