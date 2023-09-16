<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.png') }}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/style.css') }}">
	<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
	

	@yield('header')
    
</head>
<body>
    @include('sweetalert::alert')
	@yield('preload')

    @include('components.header')
    @include('components.sidebar')

    @yield('content')

    @include('components.footer')

	
    	<!-- js -->
	
	
	<script src="{{ asset('assets/scripts/core.js') }}"></script>
	<script src="{{ asset('assets/scripts/script.min.js') }}"></script>
	<script src="{{ asset('assets/scripts/process.js') }}"></script>
	<script src="{{ asset('assets/scripts/layout-settings.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>

	<!-- buttons for Export datatable -->
	<script src="{{ asset('assets/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
	<!-- Datatable Setting js -->
	<script src="{{ asset('assets/vendors/scripts/datatable-setting.js') }}"></script></body>
	<script src="{{ asset('assets/scripts/dashboard.js') }}"></script>
	
	<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
	
	
	

	
    @yield('scripts')
</body>
</html>