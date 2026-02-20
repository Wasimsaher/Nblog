@extends('layouts.app')
@section('content')
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light">
                Post Info
            </div>
            <div class="card-body">
                <h5 class="card-title fw-bold">Title: PHP</h5>
                <p class="card-text">Description: {{$post['description']}}</p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-light">
                Post Creator Info
            </div>
            <div class="card-body">
                <h5 class="card-title fw-bold">Name: {{$post['name']}}</h5>
                <p class="card-text mb-1">Email: {{$post['email']}}</p>
                <p class="card-text">Created At: {{$post['created_at']}}</p>
            </div>
        </div>
@endsection('content')
