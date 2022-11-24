@extends('admin.layouts.app-admin')

@section('title', 'Pengecekan Suhu')

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



                <form action="{{ route('store-psdc') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nmAlat">Nama Alat</label>
                                <div class="mb-2">
                                    <a href="#" class="btn btn-info btn-icon-split">
                                        <span class="icon align-items-start text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span> 
                                        <span class="text" id="nmAlat" name="nmAlat">Honeywell</span>
                                    </a> <br>
                                </div>

                                <label for="pic">Penanggung Jawab</label>
                                <input type="text" name="pic" id="pic" class="form-control">

                                <label for="area" class="col-form-label">Area</label>
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


                                <label for="suhu" class="col-form-label">Suhu Ruangan</label>
                                
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
                              
                               
                                <label for="kondisi" class="col-form-label">Kondisi Alat</label>
                                <select id="kondisi" name="kondisi" class="form-control form-select">
                                    <option selected>Pilih Alat</option>
                                    <option value="Berfungsi">Berfungsi</option>
                                    <option value="Tidak Berfungsi">Tidak Berfungsi</option>
                                </select>
                              

                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <select id="keterangan" name="keterangan" class="form-control form-select">
                                    <option selected>Pilih Keterangan</option>
                                    <option value="Normal">Suhu Ruangan Normal</option>
                                    <option value="Panas">Suhu Ruangan Panas</option>
                                </select>
                          
                                <label for="photo" class="col-form-label">Foto Perangkat</label>
                                <input type="file" class="form-control" name="photo" id="photo">
                                
                            </div>

                            <div class="col-md-6">
                                <label for="photo" class="col-form-label"></label>
                                <img id="showImage" class="img-fluid img-thumbnail" src="{{ url('upload/no-photo.png') }}" style="width: 500px; height: auto;" >
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <input type="submit" class="btn btn-primary btn-block" value="Save Data">
                            </div>

                            <div class="col-md-3">
                                <a href="{{ route('index-psdc') }}" class="btn btn-light btn-block">Back</a>
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
        $('#photo').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>
    
@endsection
