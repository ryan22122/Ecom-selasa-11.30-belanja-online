
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets') }}/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets') }}/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets') }}/css/core.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets') }}/css/components.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets') }}/css/colors.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets') }}/css/custom.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    @stack('css')
    @stack('style')
</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse bg-indigo">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ url('/admin') }}"><img src="{{ asset('backend/assets') }}/images/logo_light.png" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <div class="navbar-right">
            <p class="navbar-text">Hello, {{ auth()->user()->nama }}!</p>
        </div>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        @include('backend.layout.sidebar')

        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">

                @yield('content')

                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; {{ date('Y') }}. Belanja Online.
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

<!-- Core JS files -->
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/loaders/blockui.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/visualization/d3/d3.min.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/visualization/d3/d3_tooltip.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/forms/styling/switchery.min.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/ui/moment/moment.min.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/pickers/daterangepicker.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/notifications/sweet_alert.min.js"></script>

<script type="text/javascript" src="{{ asset('backend/assets') }}/js/core/app.js"></script>

<script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/ui/ripple.min.js"></script>
<!-- /theme JS files -->

<script>
    $(document).ready(function() {
        $('.btnLogout').on('click', function(e){
            e.preventDefault();
            $('#formLogout').submit();
        });
        $('body').on('click', '.btnDelete', function(e){
            e.preventDefault();

            var url = $(this).data('url');
            swal({
                title: "Konfirmasi tindakan",
                text: "Apakah anda yakin ingin menghapus data ini?",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                confirmButtonColor: "#f33c37",
                showLoaderOnConfirm: true
            },
            function() {
                $('#formDelete').attr('action', url);
                $('#formDelete').submit();
            });
        });
    });
</script>
@stack('js')
@stack('script')
</body>
</html>
