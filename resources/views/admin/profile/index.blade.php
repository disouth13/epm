@extends('admin.layouts.app-admin')

@section('title', 'Profile')

@push('style-before')
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endpush


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-floating mb-3">
                            <img src="{{ asset('backend/img/user-auth.jpg') }}" style="width: 200px; height: 200px;" class="img-thumbnail">
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <dl class="row">
                            <dt class="col-sm-3">Name</dt>
                            <dd class="col-sm-9">{{ $userData->name }}</dd>
                            
                            <dt class="col-sm-3">Username</dt>
                            <dd class="col-sm-9">{{ $userData->username }}</dd>
                            
                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">{{ $userData->email }}</dd>

                            <dt class="col-sm-3">Location</dt>
                            <dd class="col-sm-9"><span class="badge text-bg-primary">{{ $userData->location }}</span></dd>
                        </dl>
                        
                        <hr class="sidebar-divider my-0">

                        <div class="d-grid mt-4">
                            <a href="{{ route('edit-profile') }}" class="btn btn-rounded btn-primary btn-sm waves-effect waves-light">
                              <i class="fas fa-pen-square"></i> Update Profile</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    


@endsection