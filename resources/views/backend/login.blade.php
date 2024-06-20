<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MM Cupid :: Log in</title>
    <!-- Bootstrap -->
    <link href="{{ url('assets/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('assets/css/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Pnotify -->
    <link href="{{ url('assets/css/pnotify/pnotify.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ url('assets/css/custom.css') }}" rel="stylesheet">
    <!-- company logo -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/images/cupid.jpg') }}">
</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="username"
                                value="{{ old('username') }}" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password" />
                        </div>
                        <div>
                            <input type="hidden" name="form-sub" value="1">
                            <button type="submit" class="btn btn-default submit">Log in</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <p>©2016 All Rights Reserved.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ url('assets/js/jquery2.2/jquery.min.js') }}"></script>
    <!-- PNotify -->
    <script src="{{ url('assets/js/pnotify/pnotify.js') }}"></script>
    @if ($errors->has('username'))
        <script>
            new PNotify({
                title: 'Oh No!',
                text: "{{ $errors->first('username') }}",
                type: 'error',
                styling: 'bootstrap3'
            });
        </script>
    @endif

    @if ($errors->has('password'))
        <script>
            new PNotify({
                title: 'Oh No!',
                text: "{{ $errors->first('password') }}",
                type: 'error',
                styling: 'bootstrap3'
            });
        </script>
    @endif

    @if ($errors->has('status'))
        <script>
            new PNotify({
                title: 'Oh No!',
                text: "{{ $errors->first('status') }}",
                type: 'error',
                styling: 'bootstrap3'
            });
        </script>
    @endif

    @if ($errors->has('deleted_at'))
        <script>
            new PNotify({
                title: 'Oh No!',
                text: "{{ $errors->first('deleted_at') }}",
                type: 'error',
                styling: 'bootstrap3'
            });
        </script>
    @endif

    @if ($errors->has('unexpected'))
        <script>
            new PNotify({
                title: 'Oh No!',
                text: "{{ $errors->first('unexpected') }}",
                type: 'error',
                styling: 'bootstrap3'
            });
        </script>
    @endif
</body>

</html>
