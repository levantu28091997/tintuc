<!doctype html>
<html lang="en">

<head>
	@include('admin.layout.head')
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		@include('admin.layout.menu_top')
		@include('admin.layout.menu_left')
        <!-- MAIN -->
        
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		@include('admin.layout.footer')
	</div>
	<!-- END WRAPPER -->
	@include('admin.layout.script')
</body>

</html>
