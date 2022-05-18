@extends('layouts.admin')

@section('title', 'YourMusic - Editar Gênero')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Gêneros</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item">Gêneros</li>
                    <li class="breadcrumb-item active">Edição</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @if ($errors->any())

            @foreach ($errors->all() as $error)
                <div class="alert alert-success" role="alert">
                    {{ $error }}
                </div>
            @endforeach

        @endif

        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card">


                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Ações</h6>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/genero">
                                        <i class="bi bi-list-check"></i>
                                        Listagem
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Atualizar <span>| Gêneros</span></h5>

                            <!-- Vertical Form -->
                            <form action="/genero/update/{{ $genero->id }}" method="POST" class="row g-3 needs-validation"
                                novalidate>
                                @csrf
                                @method('PUT')
                                <div class="col-12">
                                    <label for="inputNanme4" class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="name" required
                                        value="{{ $genero->name }}">
                                    <div class="invalid-feedback">
                                        Campo obrigatório!
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
