<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title> 
    <link href="{{asset('dist/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('dist/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin/add-style.css')}}" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        @include('admin.layout.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.layout.header')
                @yield('content')
            </div>
            @include('admin.layout.footer')
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @include('admin.layout.modal')
    <script src="{{asset('dist/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('dist/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dist/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('dist/js/sb-admin-2.min.js')}}"></script>
    <script src="{{ asset('js/admin/modal-profile.js') }}" type="text/javascript"></script>
    @stack('js')
</body>
</html>