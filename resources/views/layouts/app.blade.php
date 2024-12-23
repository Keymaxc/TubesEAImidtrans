<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    
    <title>@yield('title', 'MJ')</title>

    <!-- External Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Additional Styles -->
    @stack('styles')
</head>
<body>
    <!-- Header Section -->
    @include('home.header')

    <!-- Content Section -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section -->
    @include('home.footer')

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @stack('scripts')
</body>
</html>
