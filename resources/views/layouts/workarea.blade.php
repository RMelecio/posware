<!DOCTYPE html>
<html lang="es">
    <head>
        @include('layouts.head')
    </head>
    <body>
        <!-- Loader starts -->
        <div class="loader-wrapper">
            <div class="theme-loader">
                <div class="loader-p"></div>
            </div>
        </div>
        <!-- Loader ends -->
        <!-- page-wrapper Start -->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            <!-- Page Header Start-->
            @include('layouts.header')
            <!-- Page Header Ends -->
            <!-- Page Body Start-->
            <div class="page-body-wrapper sidebar-icon">
                <!-- Page Sidebar Start-->
                @include('layouts.sidebar')
                <!-- Page Sidebar Ends-->
                <div class="page-body">
                    <!-- Container-fluid starts-->
                    <div class="container-fluid">
                        @yield('breadcrumb')
                    </div>

                    <div class="container-fluid">
                        @yield('content')
                        @yield('modals')
                    </div>
                    <!-- Container-fluid Ends-->
                </div>
                <!-- footer start-->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 footer-copyright">
                                <p class="mb-0">Copyright 2021-22 © viho All rights reserved.</p>
                            </div>
                            <div class="col-md-6">
                                <p class="pull-right mb-0"><strong>Posware</strong></p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        @include('layouts.script')
    </body>
</html>
