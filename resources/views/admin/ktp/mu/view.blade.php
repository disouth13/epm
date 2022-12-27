@extends('admin.layouts.app-admin')

@section('title', 'Lihat Detail')

@push('style-before')
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endpush


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title') - Ruangan Server {{ $viewDataMu->area }}</h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="{{ asset($viewDataMu->photo) }}" class="card-img-top img-fluid img-thumbnail mb-2">
                            <div class="card-body">
                            <button class=" btn btn-block btn-warning">Foto Perangkat {{ $viewDataMu->merek }}</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                        Keterangan
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                        <tr>
                                                            <th>PIC</th>
                                                            <td>{{ $viewDataMu->pic }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Type/Merek</th>
                                                            <td>{{ $viewDataMu->merek }}</td>
                                                        </tr>

                                                        

                                                        <tr>
                                                            <th>Area</th>
                                                            <td>{{ $viewDataMu->area }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Kondisi Alat</th>
                                                            <td>
                                                                <?php if($viewDataMu['kondisi'] == 'Normal')

                                                                { ?> <span class="badge badge-success"><?php echo $viewDataMu['kondisi']; ?></span>
                                                                <?php } else { ?> <span class="badge badge-danger"><?php echo $viewDataMu['kondisi']; ?></span>
                                                                <?php }  ?>
                                                            </td>
                                                        </tr>

                                       
                                                        <tr>
                                                            <th>Keterangan</th>
                                                            <td>
                                                                <?php if($viewDataMu['keterangan'] == 'Baterai Normal')

                                                                { ?> <span class="badge badge-success"><?php echo $viewDataMu['keterangan']; ?></span>
                                                                <?php } else { ?> <span class="badge badge-danger"><?php echo $viewDataMu['keterangan']; ?></span>
                                                                <?php }  ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Periode</th>
                                                            <td> {{ date('F Y',strtotime($viewDataMu->periode)) }} </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    

                        
                    </div>

                    <div class="row">
                        <div class="text-end">
                            <a href="{{ route('index-mu-ktp') }}" class="btn btn-secondary btn-block shadow-sm"><i class="fa fa-backward mr-2"></i> Kembali</a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
@endsection
