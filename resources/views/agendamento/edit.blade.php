@extends('agendamento.master')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h1 class="h2 mt-4">Editar agendamento</h1>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
    @endif
    @error('error')
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @enderror
    <div class="card card-body">
        <form action="{{ route('agendamento.update',$id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" value="{{ $title }}" name="titulo" id="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tipo_evento" class="form-label">Tipo evento</label>
                <select name="tipo_evento" id="tipo_evento" class="form-control">
                    {!! $options !!}
                </select>
            </div>
            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" name="allDay" value="1" type="checkbox" role="switch" id="flexSwitchCheckAllDay" {{ $isAllDay }}>
                    <label class="form-check-label" for="flexSwitchCheckAllDay">Dia todo</label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <label for="data" class="form-label">Data</label>
                    <input type="date" name="data" value="{{ $data }}" id="data" class="form-control" required>
                </div>
                <div class="col-12 col-lg-6">
                    <label for="horario" class="form-label">Horário</label>
                    <input type="time" name="horario" value="{{ $horario }}" id="horario" class="form-control" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="descricao" class="form-label">Descrição <span class="text-secondary">(opcional)</span></label>
                <textarea name="descricao" id="descricao" rows="4" class="form-control">{{ $description }}</textarea>
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-primary">Salvar alterações</button>
            </div>
        </form>
    </div>
</main>

@endsection

