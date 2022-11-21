@extends('admin.layouts.app-admin')

@section('title', 'Profile')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <label for="username">Username</label>
            <input type="username" class="form-control form-control-user" id="username">
        </div>
    </div>


@endsection