<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LayoutPage (masterPage)</title>
</head>
<body>
	<div class="container">
		<!-- found in about.blade.php -->
		@yield('content')
	</div>
	@yield('footer')
</body>
</html>