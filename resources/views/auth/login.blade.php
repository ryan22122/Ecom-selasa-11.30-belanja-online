<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belanja online - Login</title>

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

                <!-- Simple login form -->
                <form action="{{ url('/login') }}" method="post">
                    @csrf
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-bag"></i></div>
                            <h5 class="content-group" style="font-size: 24px; color: #666; font-weight: 800">Login to Belanja Online</h5>
                        </div>

                        @include('include.message')

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ @old('email') }}">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-pink-400 btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
                        </div>

                        <div class="text-center">
                            Belum punya akun? <a href="{{ url('/register') }}">Daftar</a>
                        </div>
                    </div>
                </form>
                <!-- /simple login form -->


                <!-- Footer -->
                <div class="footer text-muted text-center">
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

</body>
</html>
