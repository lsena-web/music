@extends('layouts.site')

@section('title', 'HOME - BEM-VINDO')

@section('content')
    <main id="main">

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container-fluid">

                <div class="row gy-4">

                    <div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4 p-2">
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
                                                    <label for="exampleInputPassword1"
                                                        class="form-label">Artista</label>
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
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card p-3">
                            <table class="table table-striped rounded">
                                <thead class="table-warning">
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Duração</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($musicas as $musica)
                                        <tr>
                                            <td class="fw-bold ">{{ $musica->name }}</td>
                                            <td class="fw-bold ">{{ $musica->durable }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="py-4">
                                {{ $musicas->links() }}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
@endsection
