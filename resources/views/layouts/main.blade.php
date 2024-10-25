@php
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
// dd($user->hasRole('Admin'));
@endphp
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <title>{{config('app.name')}}</title>
    <link href="/css/select2.min.css" rel="stylesheet" />
    <!-- jika menggunakan bootstrap4 gunakan css ini  -->
    <link rel="stylesheet" href="/css/select2-bootstrap4.min.css">
    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/select2/css/select2.css">
    {{-- <link href="{{ asset('assets/datatables/datatables.min.css') }}" /> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script> --}}
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <!-- Custom styles for this template-->
    
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
     
</head>
{{-- <script type="text/javascript" src="/js/jquery.min.js"></script> --}}

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    <script src="/select2/js/select2.js" defer></script>

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <img class="img-profile  "
                    src="/img/emerald2.jpg" style="margin-top:-3px">
                </div>
                <!-- <div class="sidebar-brand-text mx-3">{{config('app.name')}}</div> -->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

          
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                 
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            @if($user->hasRole('Admin'))

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item mt-0">
                <a class="nav-link" href="/member">
                    <i class="fas fa-users"></i>
                    <span>Member</span></a>
            </li>
            <li class="nav-item mt-0">
                <a class="nav-link" href="/aksesoris">
                    <i class="fas fa-drum-steelpan"></i>
                    <span>Aksesoris</span></a>
            </li>
            <li class="nav-item mt-0">
                <a class="nav-link" href="/supplier">
                    <i class="fas fa-user-tag"></i>
                    <span>Supplier</span></a>
            </li>
            <li class="nav-item mt-0">
                <a class="nav-link" href="/pembayaran">
                    <i class="fas fa-money-check"></i>
                    <span>Metode Pembayaran</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/paket">
                    <i class="fas fa-box-open"></i>
                    <span>Paket</span></a>
            </li>
            @endif

            @if($user->hasRole('Admin') || $user->hasRole('Operator'))

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                PAYMENTS
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/transaksi">
                    <i class="fas fa-book"></i>
                    <span>Application Form</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pembelian">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Pembelian</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/penjualan">
                    <i class="fas fa-store"></i>
                    <span>Penjualan</span></a>
            </li>
            @endif
            @if($user->hasRole('Admin'))
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Laporan
                </div>
                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="/laporan-mutasi">
                        <i class="far fa-file-alt"></i>
                        <span>Cetak Mutasi Stok</span></a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/laporan-application-form">
                        <i class="fas fa-receipt"></i>
                        <span>Laporan Member</span></a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/laporan-saldo-stok">
                        <i class="fas fa-archive"></i>
                        <span>Laporan Saldo Stok</span></a>
                </li> --}}
            @endif
            @if($user->hasRole('Admin'))
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Users
                </div>
                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="/user">
                        <i class="fas fa-users"></i>
                        <span>Users</span></a>
                </li>
            @endif

                {{-- <li class="nav-item">
                    <a class="nav-link collapsed" href="/" data-toggle="collapse" data-target="#collapsePagesUser"
                        aria-expanded="true" aria-controls="collapsePagesUser">
                        <i class="fas fa-users"></i>
                        <span>Users</span></a>
                    </a>
                    <div id="collapsePagesUser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="/user">User</a>
                            <a class="collapse-item" href="/role">Role</a>
                            
                        </div>
                    </div>
                </li> --}}
           
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

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
                                        <button class="btn btn-success" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-3 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                            <img class="img-profile rounded-circle"
                                src="/img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            {{-- <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            
                            <div class="dropdown-divider"></div> --}}
                        
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Main Content -->
            @yield('content')
            @stack('script')

        </div>
        <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">Logout</button>
                     
                </form>
            </div>
        </div>
    </div>
</div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; DBSoftware 2024</span>
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

    
 
    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script> --}}

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>
    

</body>

</html>