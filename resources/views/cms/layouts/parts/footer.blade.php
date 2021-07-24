<!-- END QUICK SIDEBAR-->
<!-- CORE PLUGINS-->
<script src="{{asset("assets/vendors/jquery/dist/jquery.min.js")}}"></script>
<script src="{{asset("assets/vendors/popper.js/dist/umd/popper.min.js")}}"></script>
<script src="{{asset("assets/vendors/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/vendors/metisMenu/dist/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
<script src="{{asset("assets/vendors/jquery-idletimer/dist/idle-timer.min.js")}}"></script>
<script src="{{asset("assets/vendors/toastr/toastr.min.js")}}"></script>
<script src="{{asset("assets/vendors/jquery-validation/dist/jquery.validate.min.js")}}"></script>
<script src="{{asset("assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js")}}"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="{{asset("assets/vendors/chart.js/dist/Chart.min.js")}}"></script>
<script src="{{asset("assets/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js")}}"></script>
<script src="{{asset("assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js")}}"></script>
<script src="{{asset("assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>
<!-- CORE SCRIPTS-->
<script src="{{asset("assets/js/app.min.js")}}"></script>
<!-- PAGE LEVEL SCRIPTS-->
@hasSection("js-scripts")
    @yield("js-scripts")
@endif
