<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>404</title>

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
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/style.css') }}">


</head>
<body>
	<div class="error-page d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="pd-10">
			<div class="error-page-wrap text-center">
				<h1>404</h1>
				<h3>Error: 404 Page Not Found</h3>
				<p>Sorry, the page you’re looking for cannot be accessed.<br>Either check the URL</p>
				<div class="pt-20 mx-auto max-width-200">
					
					<button class="btn btn-primary btn-block btn-lg" onclick="goBack()">Back</button>

				</div>
			</div>
		</div>
	</div>
<!-- js -->
	<script src="{{ asset('assets/scripts/core.js') }}"></script>
	<script src="{{ asset('assets/scripts/script.min.js') }}"></script>
	<script src="{{ asset('assets/scripts/process.js') }}"></script>
	<script src="{{ asset('assets/scripts/layout-settings.js') }}"></script>
     <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>