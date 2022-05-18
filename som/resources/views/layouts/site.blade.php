<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <meta content="@yield('description')" name="description">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Favicons -->
    <link href="/site/assets/img/favicon.png" rel="icon">
    <link href="/site/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/site/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/site/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/site/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/site/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/site/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/site/assets/css/style.css" rel="stylesheet">

</head>

<body>


    @yield('content')


    <!-- Vendor JS Files -->
    <script src="/site/assets/vendor/purecounter/purecounter.js"></script>
    <script src="/site/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/site/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/site/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/site/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/site/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/site/assets/js/main.js"></script>
</body>

</html>
