@extends('admin.layouts.app-admin')

@section('title', 'Pengecekan Suhu')

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



                <form action="{{ route('update-psdc') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <input type="hidden" name="id" value="{{ $ambilDataPsdc->id }}">
                        <input type="hidden" name="usersid" id="userid" value="{{ $ambilDataPsdc->users_id }}">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nmAlat" class="col-form-label">Nama Alat</label>
                                <input type="text" class="form-control" name="nmAlat" id="nmAlat" value="{{ $ambilDataPsdc->nmAlat }}" readonly>
                                @error('nmAlat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                                <label for="pic" class="col-form-label">PIC</label>
                                <input type="text" name="pic" id="pic" class="form-control"  value="{{ $ambilDataPsdc->pic }}">
                                @error('pic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                                <label for="area" class="col-form-label">Area</label>
                                <select id="area" name="area" class="form-control form-select">
                                    <option selected>{{ $ambilDataPsdc->area }}</option>
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
                                @error('area')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                                <label for="suhu" class="col-form-label">Suhu Ruangan</label>
                                
                                <select id="suhu" name="suhu" class="form-control form-select">
                                    <option selected>{{ $ambilDataPsdc->suhu }}</option>
                                    <option value="16&#176;">16&#176;</option>
                                    <option value="17&#176;">17&#176;</option>
                                    <option value="18&#176;">18&#176;</option>
                                    <option value="19&#176;">19&#176;</option>
                                    <option value="20&#176;">20&#176;</option>
                                    <option value="21&#176;">21&#176;</option>
                                    <option value="22&#176;">22&#176;</option>
                                    <option value="23&#176;">23&#176;</option>
                                    <option value="24&#176;">24&#176;</option>
                                    <option value="25&#176;">25&#176;</option>
                                    <option value="26&#176;">26&#176;</option>
                                </select>
                                @error('suhu')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              
                               
                                <label for="kondisi" class="col-form-label">Kondisi Alat</label>
                                <select id="kondisi" name="kondisi" class="form-control form-select">
                                    <option selected>{{ $ambilDataPsdc->kondisi }}</option>
                                    <option value="Berfungsi">Berfungsi</option>
                                    <option value="Tidak Berfungsi">Tidak Berfungsi</option>
                                    <option value="Tidak Terpasang">Alat Tidak Terpasang</option>
                                </select>
                                @error('kondisi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            

                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <select id="keterangan" name="keterangan" class="form-control form-select">
                                    <option selected>{{ $ambilDataPsdc->keterangan }}</option>
                                    <option value="Suhu Ruangan Normal">Suhu Ruangan Normal</option>
                                    <option value="Suhu Ruangan Panas">Suhu Ruangan Panas</option>
                                </select>
                                @error('keterangan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <label for="periode" class="col-form-label">Periode Pengecekan</label>
                                <input type="date" class="form-control" name="periode" id="periode" value="{{ $ambilDataPsdc->periode }}">
                                @error('periode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <label for="photo" class="col-form-label">Foto Perangkat</label>
                                <input type="file" class="form-control" name="photo" id="photo">
                                
                            </div>

                            <div class="col-md-4">
                                <label for="photo" class="col-form-label"></label>
                                <div class="card">
                                    <img src="{{ asset($ambilDataPsdc->photo) }}" class="card-img-top img-fluid img-thumbnail" id="showImage" >
                                    <div class="card-body">
                                        <p class="card-text"><span class="badge rounded-pill bg-warning">Foto Perangkat {{ $ambilDataPsdc->nmAlat }}</span></p>
                                    </div>
                                </div>

                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <button type="submit" class="btn btn-primary btn-block shadow-sm"><i class="fa-solid fa-arrows-rotate mr-2"></i> Ubah Data</button>
                                
                            </div>

                            <div class="col-md-3">
                                <a href="{{ route('index-psdc') }}" class="btn btn-secondary btn-block"><i class="fa fa-backward mr-2"></i> Kembali</a>
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