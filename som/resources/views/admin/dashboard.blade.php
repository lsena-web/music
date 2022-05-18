@extends('layouts.admin')

@section('title', 'YourMusic - dashboard')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- álbum Card -->
                        <div class="col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Álbuns <span>| hoje</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-music-note-beamed"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $countAlbum }}</h6>
                                            <span class="text-success small pt-1 fw-bold">100%</span> <span
                                                class="text-muted small pt-2 ps-1">Contagiante</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Músicas Card -->
                        <div class="col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Músicas <span>| hoje</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-music-note"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $countMusica }}</h6>
                                            <span class="text-success small pt-1 fw-bold">100%</span> <span
                                                class="text-muted small pt-2 ps-1">+ Você</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-danger text-light">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Deletar Álbum?
                                        </h5>
                                        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="" method="POST" id="formDelete">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-outline-light col-12 fw-bold">
                                                <i class="bi bi-trash"></i>
                                                Deletar
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Ações</h6>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="/dashboard/create">
                                                <i class="bi bi-plus-square"></i>
                                                Cadastro
                                            </a>
                                        </li>
                                    </ul>
                                </div>


                                <div class="card-body pb-0">
                                    <h5 class="card-title">Listagem de <span>| Álbuns</span></h5>

                                    <div class="row">
                                        <div class="col-auto me-auto">
                                            <form action="/dashboard" method="GET" class="row g-3">

                                                <div class="col-auto">
                                                    <label for="inputPassword2" class="visually-hidden">Álbum</label>
                                                    <input type="search" name="album" class="form-control"
                                                        id="inputPassword2" placeholder="Álbum"
                                                        value="{{ $searchAlbum }}">
                                                </div>

                                                <div class="col-auto">
                                                    <label for="inputPassword2" class="visually-hidden">Artista</label>
                                                    <input type="search" name="artista" class="form-control"
                                                        id="inputPassword2" placeholder="Artista"
                                                        value="{{ $searchArtista }}">
                                                </div>

                                                <div class="col-auto">
                                                    <button class="btn btn-primary mb-3">pesquisar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Gênero</th>
                                                <th scope="col">Artista</th>
                                                <th scope="col">Preço</th>
                                                <th scope="col">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($albuns as $album)
                                                <tr>

                                                    <th scope="row">
                                                        @if ($album->file)
                                                            <img src="{{ url('storage/' . $album->file) }}"
                                                                alt="{{ $album->name }}">
                                                        @else
                                                            <img src="{{ url('img/NotFound.webp') }}"
                                                                alt="{{ $album->name }}">
                                                        @endif

                                                    </th>

                                                    <td class="fw-bold">
                                                        {{ $album->name }}
                                                    </td>

                                                    <td>
                                                        {{ $album->gender }}
                                                    </td>

                                                    <td class="fw-bold">
                                                        {{ $album->artist }}
                                                    </td>

                                                    <td>
                                                        $ {{ $album->price }}
                                                    </td>

                                                    <td>
                                                        <div class="row">
                                                            <a href="/dashboard/{{ $album->id }}"
                                                                class="btn btn-sm btn-outline-info col m-1 fw-bold">
                                                                <i class="bi bi-ticket-detailed-fill"></i>
                                                                Detalhes
                                                            </a>
                                                            <a href="/dashboard/edit/{{ $album->id }}"
                                                                class="btn btn-sm btn-outline-primary col m-1 fw-bold">
                                                                <i class="bi bi-pencil-square"></i>
                                                                Atualizar
                                                            </a>
                                                            <button
                                                                class="botao btn btn-sm btn-outline-danger col fw-bold m-1"
                                                                id="btnDeletar" value="/dashboard/{{ $album->id }}"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="bi bi-trash"></i>
                                                                Deletar
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="py-4 text-dark fw-bold">
                                        {{ $albuns->appends([
                                                'album' => request()->get('album', ''),
                                                'artista' => request()->get('artista', ''),
                                            ])->links() }}
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Top Selling -->

                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->
@endsection
