@extends('layouts.admin')

@section('title', 'YourMusic - Listar Gêneros')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Gêneros</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item">Gêneros</li>
                    <li class="breadcrumb-item active">Listagem</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Ações</h6>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/genero/create">
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
                                            Deletar Gênero?
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
                            <h5 class="card-title">Listagem de <span>| Gêneros</span></h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($generos as $genero)
                                        <tr>
                                            <td class="fw-bold text-uppercase text-center">{{ $genero->name }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="/genero/edit/{{ $genero->id }}"
                                                        class="btn btn-sm btn-outline-primary col m-1 fw-bold">
                                                        <i class="bi bi-pencil-square"></i>
                                                        Atualizar
                                                    </a>

                                                    <div class="col">
                                                        <button
                                                            class="botao btn btn-sm btn-outline-danger col-12 m-1 fw-bold"
                                                            id="btnDeletar" value="/genero/{{ $genero->id }}"
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

    </main><!-- End #main -->
@endsection
