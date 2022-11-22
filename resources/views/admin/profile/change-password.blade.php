@extends('admin.layouts.app-admin')

@section('title', 'Change Password')

@push('style-before')
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
            </div>
            <div class="card-body">

                {{-- error handling --}}
                @if (count($errors))
                    @foreach ($errors->all() as $error )
                    <p class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"></i>
                            {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </p>
                    @endforeach
                @endif



                <form action="{{ route('update-password') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label for="oldpassword" class="col-sm-3 col-form-label">Old Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="newpassword" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="newpassword" name="newpassword">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="confirm_password" class="col-sm-3 col-form-label">Confirmation Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        </div>
                    </div>

                    <div class="text-start">

                        <input type="submit" class="btn btn-primary col-sm-3 mt-2 mr-3" value="Change Password">
                        <a href="{{ route('admin-profile') }}" class="btn btn-light col-sm-3 mt-2">Back</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection