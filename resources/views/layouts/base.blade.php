<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Simpro-E | @yield('title')</title>

    <link href="{{ asset('temp/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('img/emb.png')}}">
    <link href="{{ asset('temp/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('temp/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="{{ asset('temp/vendor/jquery/jquery.min.js') }}"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/emb.png') }}" alt="Logo" width="60px">
                </div>
                <img src="{{ asset('img/enesers.png') }}" alt="Logo" width="120px">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            @if (Auth::user()->level == 'Admin')
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fa fa-home"></i>
                    <span>Home</span></a>
            </li>
            <!-- Nav Item - Books -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fa fa-users"></i>
                    <span>Users</span></a>
            </li>
            <!-- Nav Item - Books -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('distributor.index')}}">
                    <i class="fas fa-address-book"></i>
                    <span>Distributor</span></a>
            </li>
            <!-- Nav Item - Books -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kategori.index') }}">
                    <i class="fas fa-list"></i>
                    <span>Kategori</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-server"></i>
                    <span>Produk</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('produksatu.index') }}">2022</a>
                        <a class="collapse-item" href="#">2021</a>
                        <a class="collapse-item" href="#">2020</a>
                        <a class="collapse-item" href="#">2019</a>
                        <a class="collapse-item" href="#">2018</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('maintenance.index') }}">
                    <i class="fa fa-recycle"></i>
                    <span>Maintenance</span></a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('maintenance.index') }}">
                    <i class="fa fa-recycle"></i>
                    <span>Maintenance</span></a>
            </li>
            @endif

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline mt-3">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            @auth
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi,
                                    {{auth()->user()->name}}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/id.png') }}">
                            </a>
                            @endauth
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <form action="/logout" method="get">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                {{-- membuat layout --}}
                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PT. Enesers Mitra Berkah</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Core JavaScript-->
    <script src="{{ asset('temp/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('temp/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('temp/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('temp/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('temp/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('temp/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    @stack('js')
    @include('sweetalert::alert')
</body>

</html>