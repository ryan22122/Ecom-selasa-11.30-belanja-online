<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Server error</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets') }}/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets') }}/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets') }}/css/core.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets') }}/css/components.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets') }}/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend/assets') }}/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend/assets') }}/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('backend/assets') }}/js/core/app.js"></script>

    <script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container">

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Error title -->
                <div class="text-center content-group">
                    <h1 class="error-title">500</h1>
                    <h5>Oops, an error has occurred. Internal server error!</h5>
                </div>
                <!-- /error title -->

                <!-- Error content -->
                <div class="row">
                    <div class="text-center">
                        <a href="{{ url('/') }}" class="btn bg-pink-400"><i class="icon-circle-left2 position-left"></i> Back</a>
                    </div>
                </div>
                <!-- /error wrapper -->

                <!-- Footer -->
                <div class="footer text-muted text-center">
                    &copy; {{ date('Y') }}. iKomers
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

</body>
</html>
