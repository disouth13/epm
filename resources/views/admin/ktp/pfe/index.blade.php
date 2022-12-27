@extends('admin.layouts.app-admin')

@section('title', 'Data Pengecekan Apar')

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
                            
                            <div class="mb-3">
                                <a href="{{ route('add-pfe-ktp') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-plus-square-fill mr-2"></i> Tambah Data</a>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th style="width: 3%">No.</th>
                                            <th>PIC</th>
                                            <th>Area</th>
                                            <th>Tipe Apar</th>
                                            <th>Foto</th>
                                            <th>Keterangan</th>
                                            <th>Periode</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody> 

                                        @php($i = 1)

                                        @foreach ($pfeIndexGetData as $pfeItem)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $pfeItem->pic }}</td>
                                            <td>{{ $pfeItem->area }}</td>
                                            <td>{{ $pfeItem->type }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset($pfeItem->photo) }}" class="img-fluid img-thumbnail" style="width: 85px; height: auto;">
                                            </td>
                                            <td>
                                                <?php if($pfeItem['keterangan'] == 'Apar Tersedia')

                                                { ?> <span class="badge badge-success"><?php echo $pfeItem['keterangan']; ?></span>
                                                <?php } else { ?> <span class="badge badge-danger"><?php echo $pfeItem['keterangan']; ?></span>
                                                <?php }  ?>
                                                
                                            </td>
                                            <td>{{ date('F Y',strtotime($pfeItem->periode)) }}</td>
                                            <td class="text-center">    
                                                <a href="{{ route('view-pfe-ktp', $pfeItem->pfe_id) }}" class="btn btn-primary btn-sm mb-1" title="Lihat Data"><i class="bi bi-binoculars-fill"></i></a>
                                                <a href="{{ route('edit-pfe-ktp', $pfeItem->pfe_id) }}" class="btn btn-warning btn-sm mb-1" title="Ubah Data"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{ route('delete-pfe-ktp', $pfeItem->pfe_id) }}" class="btn btn-danger btn-sm mb-1" title="Hapus Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                                
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


@endsection

