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
    <link href="/admin/assets/img/favicon.png" rel="icon">
    <link href="/admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/admin/assets/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/dashboard" class="logo d-flex align-items-center">
                <img src="/admin/assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">YourMusic</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-5">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            Bem vindo
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/">
                                <i class="bi bi-hand-index"></i>
                                <span>Página inicial</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" class="dropdown-item d-flex align-items-center"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="bi bi-box-arrow-right"></i>
                                    Sair
                                </a>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->


    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/musica">
                    <i class="bi bi-music-note"></i>
                    <span>Músicas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/genero">
                    <i class="bi bi-music-note-list"></i>
                    <span>Gêneros</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/user">
                    <i class="bi bi-people"></i>
                    <span>Usuários</span>
                </a>
            </li>

        </ul>

    </aside><!-- End Sidebar-->

    @yield('content')

    {{-- toast --}}
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <i class="bi bi-check-square-fill m-1 text-light"></i>
                <strong class="me-auto text-light">Atenção</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('msg') }}
            </div>
        </div>
    </div>

    {{-- toast --}}
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toastError" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger">
                <i class="bi bi-exclamation-triangle m-1 text-light"></i>
                <strong class="me-auto text-light">Atenção</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('msgError') }}
            </div>
        </div>
    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Lucas</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/assets/vendor/chart.js/chart.min.js"></script>
    <script src="/admin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/admin/assets/vendor/quill/quill.min.js"></script>
    <script src="/admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/admin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/admin/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/admin/assets/js/main.js"></script>


    {{-- verificando existência de mensagem --}}
    @if (session('msg'))
        <script>
            var toast = new bootstrap.Toast(document.querySelector("#liveToast"));
            toast.show();
        </script>
    @endif

    {{-- verificando existência de mensagem --}}
    @if (session('msgError'))
        <script>
            var toast = new bootstrap.Toast(document.querySelector("#toastError"));
            toast.show();
        </script>
    @endif



</body>
<script>
    let btns = document.querySelectorAll('.botao');
    let form = document.querySelector('#formDelete');

    btns.forEach((btn) => {
        btn.addEventListener('click', () => {

            form.setAttribute('action', `${btn.value}`);
            console.log(form);
        });
    })
</script>

</html>
