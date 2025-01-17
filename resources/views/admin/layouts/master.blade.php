<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS Project (codeLab)</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('adminHome') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Code Lab Studio</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adminHome') }}"><i class="fas fa-fw fa-table"></i><span>Dashboard
                    </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('category#list') }}"><i
                        class="fa-solid fa-circle-plus"></i></i><span>Category </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('product#page') }}"><i class="fa-solid fa-plus"></i></i><span>Add
                        Products </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('product#listpage') }}"><i class="fa-solid fa-layer-group"></i><span>
                        Product Lists
                    </span></a>
            </li>

            @if (Auth::user())
                @if (Auth::user()->role == 'superadmin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('payment#page') }}"><i
                                class="fa-solid fa-credit-card"></i></i><span>Payment Method
                            </span></a>
                    </li>
                @endif
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route('sale#information') }}"><i class="fa-solid fa-list"></i><span>Sale
                        Information </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('order#listPage') }}"><i
                        class="fa-solid fa-cart-shopping"></i><span>Order Board
                    </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin#contact') }}"><i
                        class="fa-solid fa-gear"></i></i><span>Contact Message</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile#changePassword') }}"><i
                        class="fa-solid fa-lock"></i></i></i><span>Change Password
                    </span></a>
            </li>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <li class="nav-item">
                    <span class="nav-link">
                        <button type="submit" class="btn btn-primary"><i
                                class="fa-solid fa-right-from-bracket"></i><span>Logout </span></button>
                    </span>
                </li>
            </form>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ Auth::user()->profile ? asset('profile_img/' . Auth::user()->profile) : asset('admin/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile#page') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                @if (Auth::user()->role == 'superadmin')
                                    <a class="dropdown-item" href="{{ route('add#adminAccount') }}">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Add new Admin
                                    </a>
                                    <a class="dropdown-item" href="{{ route('view#adminListPage') }}">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Admin Lists
                                    </a>
                                    <a class="dropdown-item" href="{{ route('view#userListPage') }}">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        User Lists
                                    </a>
                                @endif

                                <a class="dropdown-item" href="{{ route('profile#changePassword') }}">
                                    <i class="fa-solid fa-lock fa-sm fa-fw mr-2 text-gray-400"></i></i></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')
                    @include('sweetalert::alert')

                </div>
            </div>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
                <div class="modal-body">Are You sure want to logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary">Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    {{-- <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>

    @yield('status')

    @yield('confirm-order')

</body>
<script>
    function loadFile(event) {
        var reader = new FileReader();

        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

</html>
