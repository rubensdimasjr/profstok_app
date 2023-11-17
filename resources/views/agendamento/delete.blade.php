@extends('agendamento.master')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h1 class="h2 mt-4">Deletar agendamento</h1>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    </div>

    <div class="row">
        <div class="col-4">
            <form action="{{ route('agendamento.destroy',$id) }}" method="post" class="card card-body">
                @csrf
                @method('DELETE')
                <p class="fs-5">
                    Você têm certeza que deseja deletar esse agendamento?
                </p>
                <button type="submit" class="btn btn-outline-danger">Deletar</button>
            </form>
        </div>
    </div>


</main>

@endsection

