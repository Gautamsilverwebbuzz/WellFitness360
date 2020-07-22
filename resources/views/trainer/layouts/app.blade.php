<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'WellFit360') }}</title>

	<!-- Bootstrap -->
	<link href="{{ asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	{{--  CSS-Treeview  --}}
	<link rel="stylesheet" href="{{ asset('backend/jstree/dist/themes/default/style.min.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('backend/css/jquery-confirm.min.css') }}" type="text/css" />
	<link href="{{ asset('backend/css/lightcase.css') }}" rel="stylesheet" type="text/css" />
	{{--  End CSS Tree-View  --}}

	{{-- Toster CSS --}}
	<link rel="stylesheet" href="{{ asset('backend/toastr/toastr.min.css')}}">
	{{-- End toster css --}}
	<!-- Font Awesome -->
	<link href="{{ asset('backend/css/jquery-ui.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/css/multiselect.css') }}" rel="stylesheet">
	
	<link href="{{ asset('backend/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<!-- NProgress -->
	<!-- <link href="{{ asset('backend/vendors/nprogress/nprogress.css') }}" rel="stylesheet"> -->
	<!-- iCheck -->
	<!-- <link href="{{ asset('backend/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet"> -->
	<!-- bootstrap-wysiwyg -->
	<!-- <link href="{{ asset('backend/vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet"> -->
	<!-- Select2 -->
	<link href="{{ asset('backend/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
	<!-- Switchery -->
	<!-- <link href="{{ asset('backend/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet"> -->
	<!-- starrr -->
	<!-- <link href="{{ asset('backend/vendors/starrr/dist/starrr.css') }}" rel="stylesheet"> -->
	<!-- bootstrap-daterangepicker -->
	<!-- <link href="{{ asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet"> -->
	<!-- Datatables -->
	<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="{{ asset('backend/build/css/custom.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/css/customeStyle.css') }}" rel="stylesheet">
	
	<script>
		var BASE_URL = "{{ URL::to('/') }}";
	</script>
</head>
<body class="nav-md">
	<!-- <div class="loader"></div> -->
	<div id="cover-spin"></div>
	<div class="container body">
		@yield('content')
	</div>

	<!-- jQuery -->
	<script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('backend/js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('backend/js/additional-methods.min.js') }}"></script>
	<script src="{{ asset('backend/js/jquery-ui.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	{{-- Start Js-Tree & Lightcase confirm box --}}
	<script src="{{ asset('backend/jstree/dist/jstree.min.js') }}"></script>
	<script src="{{ asset('backend/js/lightcase.js') }}" type="text/javascript"></script>
	<script src="{{ asset('backend/js/jquery-confirm.min.js') }}"></script>
	{{-- End Js-Tree & Lightcase confirm box --}}

	{{-- Toster js --}}
	<script src="{{ asset('backend/toastr/toastr.min.js') }}"></script>
	{{-- End Toaster js --}}
	<!-- jquery.inputmask -->
	<!-- <script src="{{ asset('backend/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script> -->
	<!-- FastClick -->
	<!-- <script src="{{ asset('backend/vendors/fastclick/lib/fastclick.js') }}"></script> -->
	<!-- bootstrap-progressbar -->
	<script src="{{ asset('backend/vendors/raphael/raphael.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/morris.js/morris.min.js') }}"></script>
	<!-- <script src="{{ asset('backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script> -->
	<!-- iCheck -->
	<script src="{{ asset('backend/vendors/iCheck/icheck.min.js') }}"></script>
	<!-- bootstrap-wysiwyg -->
	<!-- <script src="{{ asset('backend/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script> -->
	<!-- <script src="{{ asset('backend/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script> -->
	<!-- <script src="{{ asset('backend/vendors/google-code-prettify/src/prettify.js') }}"></script> -->
	<!-- jQuery Tags Input -->
	<!-- <script src="{{ asset('backend/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script> -->
	<!-- Switchery -->
	<!-- <script src="{{ asset('backend/vendors/switchery/dist/switchery.min.js') }}"></script> -->
	<!-- Select2 -->
	<script src="{{ asset('backend/vendors/select2/dist/js/select2.full.min.js') }}"></script>
	<!-- Parsley -->
	<!-- <script src="{{ asset('backend/vendors/parsleyjs/dist/parsley.min.js') }}"></script> -->
	<!-- Autosize -->
	<!-- <script src="{{ asset('backend/vendors/autosize/dist/autosize.min.js') }}"></script> -->
	<!-- jQuery autocomplete -->
	<script src="{{ asset('backend/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
	<!-- starrr -->
	<!-- <script src="{{ asset('backend/vendors/starrr/dist/starrr.js') }}"></script> -->
	<!-- NProgress -->
	<!-- <script src="{{ asset('backend/vendors/nprogress/nprogress.js') }}"></script> -->
	<!-- Chart.js -->
	<script src="{{ asset('backend/vendors/Chart.js/dist/Chart.min.js') }}"></script>
	<!-- jQuery Sparklines -->
	<script src="{{ asset('backend/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
	<!-- Flot -->
	<!-- <script src="{{ asset('backend/vendors/Flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('backend/vendors/Flot/jquery.flot.pie.js') }}"></script>
	<script src="{{ asset('backend/vendors/Flot/jquery.flot.time.js') }}"></script>
	<script src="{{ asset('backend/vendors/Flot/jquery.flot.stack.js') }}"></script>
	<script src="{{ asset('backend/vendors/Flot/jquery.flot.resize.js') }}"></script> -->
	<!-- Flot plugins -->
	<!-- <script src="{{ asset('backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
	<script src="{{ asset('backend/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/flot.curvedlines/curvedLines.js') }}"></script> -->
	<!-- DateJS -->
	<script src="{{ asset('backend/vendors/DateJS/build/date.js') }}"></script>
	<!-- Datatables -->
	<script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
	<script src="{{ asset('backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
	<!-- <script src="{{ asset('backend/vendors/jszip/dist/jszip.min.js') }}"></script> -->
	<!-- <script src="{{ asset('backend/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/pdfmake/build/vfs_fonts.js') }}"></script> -->
	<!-- bootstrap-daterangepicker -->
	<script src="{{ asset('backend/vendors/moment/min/moment.min.js') }}"></script>
	<!-- <script src="{{ asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('backend/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script> -->
	<script src="{{ asset('backend/js/select2.min.js') }}"></script>
	<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	
	<!-- Custom Theme Scripts -->
	<script src="{{ asset('backend/js/multi-select.min.js') }}"></script>
	<script src="{{ asset('backend/build/js/custom.min.js') }}"></script>
	<script src="{{ asset('backend/js/backendScript.js') }}"></script>
  </body>
</html>
