<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <title>Skydash Admin</title>
      <!-- plugins:css -->
      <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
      <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
      <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
      <!-- endinject -->
      <!-- Plugin css for this page -->
      <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
      <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/select.dataTables.min.css') }}">
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
      <!-- endinject -->
      <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
   </head>
   <body>
      <div class="container-scroller">
         <!-- partial:partials/_navbar.html -->
         @include('admin.layout.header')
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.layout.sidebar')
            <!-- partial -->
            @yield('content')
            <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
      <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
      <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
      <script src="{{ asset('admin/js/dataTables.select.min.js') }}"></script>
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
      <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
      <script src="{{ asset('admin/js/template.js') }}"></script>
      <script src="{{ asset('admin/js/settings.js') }}"></script>
      <script src="{{ asset('admin/js/todolist.js') }}"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="{{ asset('admin/js/dashboard.js') }}"></script>
      <script src="{{ asset('admin/js/Chart.roundedBarCharts.js') }}"></script>
      <!-- End custom js for this page-->
      {{-- Custom Admin JS --}}
      <script src="{{ asset('admin/js/custom.js') }}"></script>
      {{-- End Custom Admin JS --}}
      {{-- Footer --}}
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ?? 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    {{-- End Footer --}}
   </body>
</html>
