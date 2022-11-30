@extends('admin.layouts.app-admin')

@section('title', 'Pembersihan Ruang Server')

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


                    <form action="{{ route('update-prs') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $ambilDataPrs->id }}">
                        <input type="hidden" name="usersid" id="userid" value="{{ $ambilDataPrs->users_id }}">
                        <input type="hidden" name="oldImageBefore" value="{{ $ambilDataPrs->photoBefore }}">
                        <input type="hidden" name="oldImageAfter" value="{{ $ambilDataPrs->photoAfter }}">

                            <div class="row mb-3">
                                <div class="col-md-5">
    
                                    <label for="pic">Penanggung Jawab</label>
                                    <input type="text" name="pic" id="pic" class="form-control" value="{{ $ambilDataPrs->pic }}">
    
                                    <label for="area" class="col-form-label">Area</label>
                                    <select id="area" name="area" class="form-control form-select">
                                        <option selected>{{ $ambilDataPrs->area }}</option>
                                        <option value="26A">26 A</option>
                                        <option value="26B">26 B</option>
                                        <option value="27A">27 A</option>
                                        <option value="27B">27 B</option>
                                        <option value="28A">28 A</option>
                                        <option value="28B">28 B</option>
                                        <option value="29A">29 A</option>
                                        <option value="29B">29 B</option>
                                        <option value="30A">30 A</option>
                                        <option value="30B">30 B</option>
                                    </select>
    
                                
    
                                    <label for="keterangan" class="col-form-label">Keterangan</label>
                                    <select id="keterangan" name="keterangan" class="form-control form-select">
                                        <option selected>{{ $ambilDataPrs->keterangan }}</option>
                                        <option value="Kondisi Ruangan Rapih">Kondisi Ruangan Rapih</option>
                                        <option value="Ada Barang Lain">Ada Barang Lain/Barang Divisi</option>
                                    </select>
    
                                    <label for="periode" class="col-form-label">Periode Pengecekan</label>
                                    <input type="date" class="form-control" name="periode" id="periode" value="{{ $ambilDataPrs->periode }}">
    
                                    <label for="photoBefore" class="col-form-label">Foto Sebelum</label>
                                    <input type="file" class="form-control" name="photoBefore" id="photoBefore">
    
                                    <label for="photoAfter" class="col-form-label">Foto Sesudah</label>
                                    <input type="file" class="form-control" name="photoAfter" id="photoAfter">
                                    
                                </div>
    
                                <div class="col-md-3 mr-2 mt-3">
                                
                                    <div class="card">
                                        <img src="{{ asset($ambilDataPrs->photoBefore) }}" class="card-img-top img-fluid" id="showImageSebelum">
                                        <div class="card-body">
                                            <p class="card-text"><span class="badge badge-warning">Foto Sebelum</span></p>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-3 mt-3">
        
                                    <div class="card">
                                        <img src="{{ asset($ambilDataPrs->photoAfter) }}" class="card-img-top img-fluid" id="showImageSesudah">
                                        <div class="card-body">
                                            <p class="card-text"><span class="badge badge-info">Foto Sesudah</span></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
    
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <input type="submit" class="btn btn-primary btn-block" value="Update Data">
                                </div>
    
                                <div class="col-md-3">
                                    <a href="{{ route('index-prs') }}" class="btn btn-light btn-block">Back</a>
                                </div>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- script jquery untuk mengubah file gambar --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#photoBefore').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImageSebelum').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });


        $(document).ready(function() {
            $('#photoAfter').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImageSesudah').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

    </script>
@endsection