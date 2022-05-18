@extends('layouts.site')

@section('title', 'HOME - BEM-VINDO')

@section('content')

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="/">YourMusic</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
                    <li><a class="nav-link scrollto" href="#album">Albuns</a></li>
                    @guest
                        {{-- verifica se estar autenticado, se sim, vc não é guest do sistema, então esse link sumirá --}}
                        {{-- se estiver autenticado esse link some --}}
                        <li><a class="nav-link scrollto" href="/login">Login</a></li>
                    @endguest

                    @auth
                        {{-- verifica se estar autenticado, se sim, vc não é guest do sistema, então esse link aparecerá --}}
                        {{-- se vc estiver autenticado esse link aparece --}}
                        <li><a class="nav-link scrollto" href="/dashboard">Dashboard</a></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                            </form>
                        </li>
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container position-relative">
            <h1>Bem-vindo ao YourMusic</h1>
            <h2>A melhor plataforma de música do mundo, aqui você irá encontrar a YourMusic ; )</h2>
            <a href="#about" class="btn-get-started scrollto">Iniciar</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <img src="/site/assets/img/about.webp" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h3>Música é em qualquer lugar</h3>
                        <p>
                            A música vai aonde quer que você vá. Resso atualmente oferece suporte para ouvir em vários
                            dispositivos, incluindo computadores e celulares. Aproveite a música em qualquer lugar e a
                            qualquer hora.
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <i class="bi bi-broadcast"></i>
                                <h4>Música é conectar</h4>
                                <p>
                                    Uma música não é igual para todo mundo e reflete como cada pessoa escolhe se expressar!
                                    É por isso que YourMusic mostra diferentes músicas.
                                    Aqui o que vale é ser você e compartilhar a vibe com quem gosta!
                                </p>
                            </div>
                            <div class="col-md-6">
                                <i class="bi bi-activity"></i>
                                <h4>Música é sentir.</h4>
                                <p>Quem não ama cantar aquela música que gruda na cabeça? Que produz sensações e sentimentos
                                    e ainda tem tudo a ver com a nossa história?</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts section-bg">
            <div class="container">

                <div class="row counters">

                    <div class="col-lg-6 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $countAlbum }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Álbuns</p>
                    </div>

                    <div class="col-lg-6 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $countMusica }} "
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Músicas</p>
                    </div>
                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Album Section ======= -->
        <section id="album" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <h2>Álbuns</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit
                        in iste officiis commodi quidem hic quas.</p>
                </div>


                <div class="row">
                    <div class="col-auto me-auto">
                        <form action="/" method="GET" class="row g-3">

                            <div class="col-auto">
                                <label for="inputPassword2" class="visually-hidden">Álbum</label>
                                <input type="search" name="album" class="form-control" id="inputPassword2"
                                    placeholder="Álbum" value="{{ $searchAlbum }}">
                            </div>

                            <div class="col-auto">
                                <label for="inputPassword2" class="visually-hidden">Gênero</label>
                                <input type="search" name="genero" class="form-control" id="inputPassword2"
                                    placeholder="Gênero" value="{{ $searchGenero }}">
                            </div>

                            <div class="col-auto">
                                <button class="btn btn-warning mb-3">pesquisar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row portfolio-container">

                    @foreach ($albuns as $album)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">

                            @if ($album->file)
                                <img src="{{ url('storage/' . $album->file) }}" class="img-fluid"
                                    alt="{{ $album->name }}">
                            @else
                                <img src="{{ url('img/NotFound.webp') }}" class="img-fluid"
                                    alt="{{ $album->name }}">
                            @endif
                            <div class="portfolio-info">
                                <h4><i class="bi bi-disc"></i> {{ $album->name }}</h4>
                                <p><i class="bi bi-music-note-list"></i> {{ $album->gender }}</p>

                                @if ($album->file)
                                    <a href="{{ url('storage/' . $album->file) }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox preview-link" title="{{ $album->name }}">
                                        <i class="bx bx-plus"></i>
                                    </a>
                                @else
                                    <a href="{{ url('img/NotFound.webp') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox preview-link" title="{{ $album->name }}">
                                        <i class="bx bx-plus"></i>
                                    </a>
                                @endif

                                <a href="/details/{{ $album->id }}" data-gallery="portfolioDetailsGallery"
                                    data-glightbox="type: external" class="portfolio-details-lightbox details-link"
                                    title="Portfolio Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="py-4 text-dark fw-bold">
                    {{ $albuns->appends([
                            'album' => request()->get('album', ''),
                            'genero' => request()->get('genero', ''),
                        ])->links() }}
                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Testimonials</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit
                        in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium
                                    quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src=/site/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis
                                    quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/site/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam
                                    duis minim
                                    tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/site/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat
                                    minim velit
                                    minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum
                                    veniam.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/site/assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam enim culpa
                                    labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi
                                    cillum quid.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="/site/assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Lucas</span></strong>. All Rights Reserved
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
