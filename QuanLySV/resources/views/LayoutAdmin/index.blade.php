<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assetAdmin/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assetAdmin/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetAdmin/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('assetAdmin/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetAdmin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetAdmin/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- ckeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

    @include('LayoutAdmin.header')

    @yield('admin_content')

    @include('LayoutAdmin.footer')


    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <!-- Required vendors -->
    <script src="{{ asset('assetAdmin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assetAdmin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('assetAdmin/js/custom.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('assetAdmin/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assetAdmin/vendor/morris/morris.min.js') }}"></script>


    <script src="{{ asset('assetAdmin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assetAdmin/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('assetAdmin/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('assetAdmin/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assetAdmin/vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('assetAdmin/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('assetAdmin/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assetAdmin/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('assetAdmin/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <!-- Datatable -->
    <script src="{{ asset('assetAdmin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assetAdmin/js/plugins-init/datatables.init.js') }}"></script>

    <script src="{{ asset('assetAdmin/js/dashboard/dashboard-1.js') }}"></script>
    {{-- sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- Toast --}}
    <div id="toast__hong"></div>

</body>

</html>
