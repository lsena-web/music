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

                <div class="col-lg-12">

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
                            <form action="/dashboard" method="POST" class="row g-3 needs-validation" novalidate
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Capa</label>
                                    <input class="form-control" type="file" name="file" id="formFile" accept="image/*">
                                </div>

                                <div class="col-md-6">
                                    <label for="inputNanme4" class="form-label">Nome</label>
                                    <input type="text" class="form-control" required name="name"
                                        value="{{ old('name') }}">
                                    <div class="invalid-feedback">
                                        Campo obrigatório!
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Artista</label>
                                    <input type="text" class="form-control" required name="artist"
                                        value="{{ old('artist') }}">
                                    <div class="invalid-feedback">
                                        Campo obrigatório!
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Gênero</label>
                                    <select class="form-select" name="gender" required>
                                        <option selected value=""></option>
                                        @foreach ($generos as $genero)
                                            <option>{{ $genero->name }}</option>
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
                                            value="{{ old('price') }}">
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
