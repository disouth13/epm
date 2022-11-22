@extends('admin.layouts.app-admin')

@section('title', 'Update Profile')

@push('style-before')
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endpush

@push('script-before')         
<script src="{{ url('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>
@endpush

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('store-profile') }}" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control mb-3" id="name" name="name" value="{{ $editUserData->name }}">

                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control mb-3" id="username" name="username" value="{{ $editUserData->username }}">

                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control mb-3" id="email" name="email" value="{{ $editUserData->email }}">

                      <label for="location" class="form-label">Location</label>
                      <select id="location" name="location" class="form-control form-select">
                        <option selected>{{ $editUserData->location }}</option>
                        <option value="Ketapang">Ketapang</option>
                        <option value="Manhattan">Manhattan</option>
                      </select>

                    </div>
                    <div class="col-md-6">
                      <label for="image_user" class="form-label">Profile Image</label> <br>
                      <img id="showImage" class="img-thumbnail" style="width: 150px; height: auto;" src="{{ (!empty($editUserData->image_user)) ? url('upload/user/'.$editUserData->image_user) : url('upload/no-photo.png') }}">
                      <input type="file" class="form-control mt-3" id="image_user" name="image_user">

                    </div>
                    
                    <div class="text-end">
                      <input type="submit" class="btn btn-primary" value="Update Profile"></input>
                      <a href="{{ route('admin-profile') }}" class="btn btn-secondary">Back</a>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>


{{-- script jquery untuk mengubah file gambar --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#image_user').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>
    
@endsection

