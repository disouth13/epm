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
                            
                            <div class="mb-3">
                                <a href="{{ route('add-psdc') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-plus-square-fill"></i> Tambah Data</a>
                            </div>
                            
                            <div class="table-responsive">
                               <table class="table table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th style="width: 3%">No.</th>
                                            <th>Area</th>
                                            <th>Suhu</th>
                                            <th>Kondisi</th>
                                            <th>Periode</th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>USA</td>
                                            <td>Female</td>
                                            <td>Yes</td>
                                            <td>Yes</td>
                                            <td><span class="badge bg-primary">Primary</span></td>
                                            <td class="text-center">    
                                                <a href="#" class="btn btn-primary btn-sm mb-1" title="View"><i class="bi bi-binoculars-fill"></i></a>
                                                <a href="#" class="btn btn-info btn-sm mb-1" title="Approve"><i class="bi bi-check-circle-fill"></i></a>
                                                <a href="#" class="btn btn-warning btn-sm mb-1" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm mb-1" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                                
                                            </td>
                                        </tr>

                                        

                                      
                                    </tbody>
                               </table>
                            </div>
                        
                </div>
            </div>
        </div>
    </div>


   
@endsection