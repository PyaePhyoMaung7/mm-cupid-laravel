    <!-- footer content -->
    <footer class="">
        <div class="pull-right">
            <a href="{{ url('admin-backend/index') }}">{{ Session::get('site_title') }} </a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src="{{ url('assets/js/jquery2.2/jquery.min.js') }}"></script>
    <!-- PNotify -->
    <script src="{{ url('assets/js/pnotify/pnotify.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ url('assets/js/icheck/icheck.min.js') }}"></script>
    <!-- Sweet Alert -->
    <script src="{{ url('assets/js/sweetalert/sweetalert.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ url('assets/js/fastclick/fastclick.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ url('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ url('assets/js/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ url('assets/js/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ url('assets/js/flot/jquery.flot.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ url('assets/js/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ url('assets/js/datejs/date.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ url('assets/js/custom.js?v=20240409') }}"></script>

    @if (session('success_msg'))
    <script>
        new PNotify({
            title: 'Successful',
            text: "{{ session('success_msg') }}",
            type: 'success',
            styling: 'bootstrap3'
        });
    </script>
    @endif

    @if (session('fail_msg'))
    <script>
        new PNotify({
            title: 'Oh No!',
            text: "{{ session('fail_msg') }}",
            type: 'error',
            styling: 'bootstrap3'
        });
    </script>
    @endif

