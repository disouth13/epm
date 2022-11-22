@extends('admin.layouts.app-admin')

@section('title', 'Change Password')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-4">
                          <input type="oldpassword" class="form-control" id="oldpassword" name="oldpassword">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-4">
                          <input type="oldpassword" class="form-control" id="oldpassword" name="oldpassword">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-4">
                          <input type="oldpassword" class="form-control" id="oldpassword" name="oldpassword">
                        </div>
                    </div>

                    
                    
                      

                   
                 
                    
                    
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection