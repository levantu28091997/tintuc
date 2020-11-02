<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="{{asset('')}}" />
	<!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Nunito+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">

  <!-- Library -->
  <link rel="stylesheet" href="vendors/slick/slick.css">
  <link rel="stylesheet" href="vendors/slick/slick-theme.css">
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Homepage Z-team</title>
  </head>
  <body>
    <!-- Header -->
    @include('layout.header')

    <!-- Main-content -->
    <div class="main-content">
      @yield('content')
    </div>

    <!-- Footer -->
    @include('layout.footer')

    <!-- Scroll up -->
    <div class="scroll-to-top" id="scroll-to-top">
      <img src="images/icon/icon-scroll-up.png" alt="Scroll to top" id="js-scroll-to-top">
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="vendors/slick/slick.min.js"></script>
    <script src="vendors/jquery.waypoints.min.js"></script>
    <script src="vendors/jquery.counterup.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>