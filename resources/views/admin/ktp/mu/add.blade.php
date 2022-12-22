@extends('admin.layouts.app-admin')

@section('title', 'Pengecekan Maintenance UPS')

@push('style-before')
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css') }}">
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



                <form action="{{ route('store-mu') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="row mb-3">
                            <div class="col-md-5">

                                <label for="merek" class="col-form-label">Type/Merek</label>
                                <input type="text" name="merek" id="merek" class="form-control" value="Eaton 1kva" readonly>

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

                        

                                <label for="kondisi" class="col-form-label">Kondisi UPS</label>
                                <select id="kondisi" name="kondisi" class="form-control form-select">
                                    <option selected>Pilih Kondisi</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Tidak Normal">Tidak Normal/Ups Mati</option>
                                    
                                </select>

                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <select id="keterangan" name="keterangan" class="form-control form-select">
                                    <option selected>Pilih Keterangan</option>
                                    <option value="Baterai Normal">Baterai Normal</option>
                                    <option value="Baterai Bocor">Baterai Bocor</option>
                                </select>

                                <label for="periode" class="col-form-label">Periode Pengecekan</label>
                                <input type="date" class="form-control" name="periode" id="periode">

                                <label for="photo" class="col-form-label">Foto Perangkat UPS</label>
                                <input type="file" class="form-control" name="photo" id="photo">
                            </div>

                            <div class="col-md-3 mr-2 mt-3">
                            
                                <div class="card">
                                    <img src="{{ url('upload/no-photo.png') }}" class="card-img-top img-fluid" id="showImageSebelum" style="height: auto;">
                                    <div class="card-body">
                                        <p class="card-text"><span class="badge badge-warning">Foto Ups - Eaton 1kva</span></p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <button type="submit" class="btn btn-primary btn-block shadow-sm"><i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Data</button>
                            </div>

                            <div class="col-md-2">
                                <a href="{{ route('index-ppak') }}" class="btn btn-secondary btn-block shadow-sm"><i class="fa fa-backward mr-2"></i> Kembali</a>
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
                $('#showImageSebelum').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });


    

</script>
@endsection