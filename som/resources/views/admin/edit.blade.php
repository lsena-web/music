@extends('layouts.admin')

@section('title', 'YourMusic - Cadastrar Álbum')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Álbuns</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item">Álbuns</li>
                    <li class="breadcrumb-item active">Cadastro</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @if ($errors->any())

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach

        @endif

        <section class="section dashboard">

            <div class="row">


                <div class="col-lg-4">

                    @if ($album->file)
                        <div class="card">

                            <div class="text-center p-1">
                                <img src="{{ url('storage/' . $album->file) }}" class="card-img-top"
                                    alt="{{ $album->name }}" style="max-height: 400px; max-width: 400px;">
                            </div>

                            @if ($album->file != 'albuns/md3.png')
                                <div class="card-body">
                                    <form action="/dashboard/updateFile/{{ $album->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row my-2">
                                            <button class="btn btn-outline-danger fw-bold col">
                                                <i class="bi bi-trash"></i>
                                                Deletar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif

                        </div>
                    @else
                        <div class="card">
                            <img src="{{ url('img/NotFound.webp') }}" class="card-img-top" alt="{{ $album->name }}"
                                style="max-height: 400px; max-width: 400px;">
                        </div>
                    @endif

                </div>

                <div class="col-lg-8">

                    <div class="card">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Ações</h6>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/dashboard">
                                        <i class="bi bi-list-check"></i>
                                        Listagem
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Cadastro <span>| Álbuns</span></h5>

                            <!-- Vertical Form -->
                            <form action="/dashboard/update/{{ $album->id }}" method="POST"
                                class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Capa</label>
                                    <input class="form-control" type="file" name="file" id="formFile" accept="image/*">
                                </div>

                                <div class="col-md-6">
                                    <label for="inputNanme4" class="form-label">Nome</label>
                                    <input type="text" class="form-control" required name="name"
                                        value="{{ $album->name }}">
                                    <div class="invalid-feedback">
                                        Campo obrigatório!
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Artista</label>
                                    <input type="text" class="form-control" required name="artist"
                                        value="{{ $album->artist }}">
                                    <div class="invalid-feedback">
                                        Campo obrigatório!
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Gênero</label>
                                    <select class="form-select" name="gender" required>

                                        <option selected value="{{ $album->gender }}">{{ $album->gender }}</option>

                                        @foreach ($generos as $genero)
                                            @if ($genero->name != $album->gender)
                                                <option>{{ $genero->name }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                    <div class="invalid-feedback">
                                        Campo obrigatório!
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Preço</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" required name="price"
                                            value="{{ $album->price }}">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form><!-- Vertical Form -->
                        </div>

                    </div>
                </div>
        </section>


        </div>

    </main><!-- End #main -->
@endsection
