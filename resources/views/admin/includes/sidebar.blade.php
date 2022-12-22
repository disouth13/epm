<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="{{ url('backend/img/iconic.svg') }}" alt="" srcset="">
        </div>
        <div class="sidebar-brand-text mx-2">
            Preventif Maintenance
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Menu Utama</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kantor
    </div>

    @if (Auth::user()->location == 'Manhattan')
        {{-- kantor manhattan --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#theManhattan"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa-solid fa-building-circle-check"></i>
                <span>Manhattan</span>
            </a>
            <div id="theManhattan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Preventif EDC Manhattan</h6>
                    <a class="collapse-item" href="{{ route('index-psdc') }}">Pengecekan Suhu</a>
                    <a class="collapse-item" href="{{ route('index-prs') }}">Ruang Server</a>
                    <a class="collapse-item" href="{{ route('index-pfe') }}">Pengecekan Apar</a>
                    <a class="collapse-item" href="{{ route('index-ppak') }}">Pengecekan AC</a>
                    <a class="collapse-item" href="{{ route('index-mu') }}">Pengecekan UPS</a>
                    <hr>
                    <a class="collapse-item" href="#">Pengcekan Vicon</a>
                </div>
            </div>
        </li>

    @else
        {{-- kantor ketapang --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ketapang"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Ketapang</span>
        </a>
        <div id="ketapang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Preventif EDC Manhattan</h6>
                <a class="collapse-item" href="{{ route('index-psdc-ktp') }}">Pengecekan Suhu</a>
                <a class="collapse-item" href="cards.html">Ruang Server</a>
                <a class="collapse-item" href="cards.html">Pengecekan Apar</a>
                <a class="collapse-item" href="cards.html">Pengecekan AC</a>
                <a class="collapse-item" href="cards.html">Pengecekan UPS</a>
                <hr>
                <a class="collapse-item" href="cards.html">Pengcekan Vicon</a>

            </div>
        </div>
    </li>

    @endif

 
   

    
    

  

    

    


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pengaturan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-cogs fa-sm fa-fw"></i>
            <span>Pengaturan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pengaturan</h6>
                <a class="collapse-item" href="{{ route('admin-profile') }}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>
                <a class="collapse-item" href="{{ route('change-password') }}"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Ubah Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="{{ route('register') }}">Register</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>