@extends('layouts.admin')

@section('title', 'YourMusic - Detalhes Álbum')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Álbum</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item">Álbum</li>
                    <li class="breadcrumb-item active">Detalhes</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">

            <div class="row">


                <div class="col-lg-6">
                    <!-- Card with an image on left -->
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if ($albuns->file)
                                    <img src="{{ url('storage/' . $albuns->file) }}" class="img-fluid rounded-start"
                                        alt="{{ $albuns->name }}">
                                @else
                                    <img src="{{ url('img/NotFound.webp') }}" class="img-fluid rounded-start"
                                        alt="{{ $albuns->name }}">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $albuns->name }}</h5>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Artista</label>
                                                <input type="text" class="form-control fw-bold" disabled
                                                    value="{{ $albuns->artist }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Gênero</label>
                                                <input type="text" class="form-control fw-bold" disabled
                                                    value="{{ $albuns->gender }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="exampleInputPassword1" class="form-label">Preço</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">$</span>
                                                <input type="text" class="form-control fw-bold" disabled
                                                    value="{{ $albuns->price }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Card with an image on left -->

                </div>

                <!-- Left side columns -->
                <div class="col-lg-6">
                    <div class="card recent-sales overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Ações</h6>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/musica/create/{{ $albuns->id }}">
                                        <i class="bi bi-plus-square"></i>
                                        Cadastro
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-danger text-light">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Deletar Música?
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

                        <div class="card-body">
                            <h5 class="card-title">Listagem de <span>| Músicas</span></h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Duração</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($musicas as $musica)
                                        <tr>
                                            <td class="fw-bold text-uppercase text-center">{{ $musica->name }}</td>
                                            <td class="fw-bold text-uppercase text-center">{{ $musica->durable }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="/musica/edit/{{ $musica->id }}"
                                                        class="btn btn-sm btn-outline-primary col m-1 fw-bold">
                                                        <i class="bi bi-pencil-square"></i>
                                                        Atualizar
                                                    </a>

                                                    <div class="col">
                                                        <button
                                                            class="botao btn btn-sm btn-outline-danger col-12 fw-bold m-1"
                                                            id="btnDeletar" value="/musica/{{ $musica->id }}"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="bi bi-trash"></i>
                                                            Deletar
                                                        </button>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main>
@endsection
