@extends('admin.layouts.app-admin')

@section('title', 'View Detail')

@push('style-before')
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endpush


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title') - Ruangan Server {{ $viewPsdcData->area }}</h6>
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

                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset($viewPsdcData->photo) }}" class="img-fluid img-thumbnail mb-2">
                    </div>

                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li><p><strong>Pengecekan Ruangan Server {{ $viewPsdcData->area }} - {{ $viewPsdcData->pic }}</strong></p></li>
                            <li>Hasil Pengecekan :
                                <ul>
                                    <li>Merek {{ $viewPsdcData->nmAlat }}</li>
                                    <li>Suhu {{ $viewPsdcData->suhu }}</li>
                                    <li>Kondisi {{ $viewPsdcData->kondisi }}</li>
                                    <li>{{ $viewPsdcData->keterangan }}</li>
                                    <li>Periode <span class="badge badge-primary">{{ date('F Y',strtotime($viewPsdcData->periode)) }}</li>
                                    
                                </ul>
                            </li>
                        
                            <!-- Divider -->
                            <hr class="sidebar-divider">
                        </ul>

                        
                    </div>

                    <div class="row">
                        <div class="text-end">
                            <a href="{{ route('index-psdc') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
@endsection
