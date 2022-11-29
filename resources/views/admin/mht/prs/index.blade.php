@extends('admin.layouts.app-admin')

@section('title', 'Data Pengecekan Server')

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
                                <a href="{{ route('add-prs') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-plus-square-fill"></i> Tambah Data</a>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th style="width: 3%">No.</th>
                                            <th>PIC</th>
                                            <th>Area</th>
                                            <th>Foto Before</th>
                                            <th>Foto After</th>
                                            <th>Keterangan</th>
                                            <th>Periode</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody> 

                                        @php($i = 1)

                                        @foreach ($prsIndexGetData as $prsItem)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $prsItem->pic }}</td>
                                            <td>{{ $prsItem->area }}</td>
                                            <td>
                                                <img src="{{ asset($prsItem->photoBefore) }}" class="img-fluid img-thumbnail" style="width: 85px; height: auto;">
                                            </td>
                                            <td><img src="{{ asset($prsItem->photoAfter) }}" class="img-fluid img-thumbnail" style="width: 85px; height: auto;"></td>
                                            <td>
                                                <?php if($prsItem['keterangan'] == 'Kondisi Ruangan Rapih')

                                                { ?> <span class="badge badge-success"><?php echo $prsItem['keterangan']; ?></span>
                                                <?php } else { ?> <span class="badge badge-danger"><?php echo $prsItem['keterangan']; ?></span>
                                                <?php }  ?>
                                                
                                            </td>
                                            <td>{{ date('F Y',strtotime($prsItem->periode)) }}</td>
                                            <td class="text-center">    
                                                <a href="{{ route('view-prs', $prsItem->id) }}" class="btn btn-primary btn-sm mb-1" title="View"><i class="bi bi-binoculars-fill"></i></a>
                                                <a href="{{ route('edit-prs', $prsItem->id) }}" class="btn btn-warning btn-sm mb-1" title="Update"><i class="bi bi-pencil-square"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm mb-1" title="Delete" id="delete"><i class="fas fa-trash-alt"></i></a>
                                                
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

