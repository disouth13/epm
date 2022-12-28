@extends('admin.layouts.app-admin')

@section('title', 'Data Pengecekan Suhu')

@push('style-before')
    
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css') }}">
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


                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="{{ route('add-psdc') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-plus-square-fill mr-2"></i> Tambah</a>
                                {{-- <a href="#" class="d-sm-inline-block btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" shadow-sm"><i class="bi bi-funnel"></i> Filter</a> --}}
                                <div class="dropdown">
                                    <button class="d-sm-inline btn btn-primary btn-sm shadow-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-funnel"></i> Filter
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-calendar mr-2"></i>Periode</button></li>
                                        <li><button class="dropdown-item" type="button"><i class="bi bi-binoculars mr-2"></i>Kondisi</button></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th style="width: 3%">No.</th>
                                            <th>PIC</th>
                                            <th>Photo</th>
                                            <th>Area</th>
                                            <th>Suhu</th>
                                            <th>Kondisi Alat</th>
                                            <th>Keterangan</th>
                                            <th>Periode</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody> 

                                        @php($i = 1)

                                        @foreach ($psdcIndexGetData as $psdcItem)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $psdcItem->pic }}</td>
                                            <td>
                                                <img src="{{ asset($psdcItem->photo) }}" class="img-fluid img-thumbnail" style="width: 85px; height: auto;">
                                            </td>
                                            <td>{{ $psdcItem->area }}</td>
                                            <td>{{ $psdcItem->suhu }}</td>
                                            <td>
                                                
                                                <?php if($psdcItem['kondisi'] == 'Berfungsi')

                                                { ?> <span class="badge badge-success"><?php echo $psdcItem['kondisi']; ?></span>
                                                <?php } else { ?> <span class="badge badge-danger"><?php echo $psdcItem['kondisi']; ?></span>
                                                <?php }  ?>
                                            
                                            </td>
                                            <td>
                                                <?php if($psdcItem['keterangan'] == 'Suhu Ruangan Normal')

                                                { ?> <span class="badge badge-success"><?php echo $psdcItem['keterangan']; ?></span>
                                                <?php } else { ?> <span class="badge badge-danger"><?php echo $psdcItem['keterangan']; ?></span>
                                                <?php }  ?>
                                                
                                            </td>
                                            <td>{{ date('F Y',strtotime($psdcItem->periode)) }}</td>
                                            <td class="text-center">    
                                                <a href="{{ route('view-psdc', $psdcItem->psdcs_id) }}" class="btn btn-primary btn-sm mb-1" title="Lihat Data"><i class="bi bi-binoculars-fill"></i></a>
                                                <a href="{{ route('edit-psdc', $psdcItem->psdcs_id) }}" class="btn btn-warning btn-sm mb-1" title="Ubah Data"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{ route('delete-psdc', $psdcItem->psdcs_id) }}" class="btn btn-danger btn-sm mb-1" title="Hapus Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                                
                                            </td>
                                        </tr>
                                        @endforeach

                                    

                                    </tbody>
                                </table>
                            </div>
                        
                </div>
            </div>
        </div>
    </div>


    {{-- modal periode --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Search By Periode</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="periode1" class="col-form-label">Mulai Periode</label>
                        <input type="date" class="form-control" id="periode1" name="periode1">
                    </div>

                    <div class="mb-3">
                        <label for="periode2" class="col-form-label">Akhir Periode</label>
                        <input type="date" class="form-control" id="periode2" name="periode2">
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary">Search</button>
                </div>
            </div>
            </div>
        </div>



@endsection