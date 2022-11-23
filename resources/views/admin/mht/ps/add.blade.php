@extends('admin.layouts.app-admin')

@section('title', 'Pengecekan Suhu')

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



                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf


            
                       
                            <div class="mb-3 row">
                                <label for="nmAlat" class="col-sm-3 col-form-label">Nama Alat</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nmAlat" id="nmAlat" class="btn btn-primary btn-block" value="Honeywell">
                                </div>
        
                            </div>
        
                            <div class="mb-3 row">
                                <label for="area" class="col-sm-3 col-form-label">AREA</label>
                                <div class="col-sm-4">
                                    <select id="area" name="area" class="form-control form-select">
                                        <option selected>Pilih Area</option>
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
                                </div>
                            </div>
        
                            <div class="mb-3 row">
                                <label for="suhu" class="col-sm-3 col-form-label">Suhu Ruangan</label>
                                <div class="col-sm-4">
                                    <select id="suhu" name="suhu" class="form-control form-select">
                                        <option selected>Pilih Suhu</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                      </select>
                                </div>
        
                                
                            </div>
        
                            <div class="mb-3 row">
                                <label for="kondisi" class="col-sm-3 col-form-label">Kondisi Alat</label>
                                <div class="col-sm-4">
                                    <select id="kondisi" name="kondisi" class="form-control form-select">
                                        <option selected>Pilih Alat</option>
                                        <option value="Berfungsi">Berfungsi</option>
                                        <option value="Tidak Berfungsi">Tidak Berfungsi</option>
                                      </select>
                                </div>
                            </div>
        
                            <div class="mb-3 row">
                                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-4">
                                    <select id="keterangan" name="keterangan" class="form-control form-select">
                                        <option selected>Pilih Keterangan</option>
                                        <option value="Normal">Suhu Ruangan Normal</option>
                                        <option value="Panas">Suhu Ruangan Panas</option>
                                      </select>
                                </div>
                            </div>
        
                            <div class="mb-3 row">
                                <label for="photo" class="col-sm-3 col-form-label">Foto Perangkat</label>
                                <div class="col-sm-4">
                                    <input type="file" class="form-control" name="photo" id="photo">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="photo" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded" src="{{ url('upload/no-photo.png') }}" alt="Card image">
                                </div>
                            </div>



        
                            <div class="mb-3 row">
                                <label for="pic" class="col-sm-3 col-form-label">PIC</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="pic" id="pic">
                                </div>
                            </div>
                        

                

                    
                    

                   

                   
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
