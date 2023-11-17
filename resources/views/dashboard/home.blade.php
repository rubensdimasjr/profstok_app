@extends('dashboard.master')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="row mt-4">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-muted">Itens no Estoque</h5>
                    <p class="card-text">
                        <div class="fs-1 text-center fw-bold">300</div>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-muted">Professores</h5>
                    <p class="card-text">
                        <div class="fs-1 text-center fw-bold">300</div>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-muted">Agendamentos</h5>
                    <p class="card-text">
                        <div class="fs-1 text-center fw-bold">300</div>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-muted">Administradores</h5>
                    <p class="card-text">
                        <div class="fs-1 text-center fw-bold">300</div>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    </div>

    <div class="row">
        <div class="col-12 col-md-8">
            <canvas class="my-5" id="myChart"></canvas>
        </div>
        <div class="col-12 col-md-4">
            <canvas class="my-5" id="pieChart" width=""></canvas>
        </div>
    </div>
</main>

@endsection

