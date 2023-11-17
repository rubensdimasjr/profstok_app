@extends('agendamento.master')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#modalNovoAgendamento">Cadastrar novo</button>
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
    <div id='calendar'></div>
    <!-- Modal -->
    <div class="modal fade" id="modalNovoAgendamento" tabindex="-1" aria-labelledby="modalNovoAgendamentoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('agendamento.store') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalNovoAgendamentoLabel">Novo evento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" name="titulo" id="titulo" placeholder="Responsável ou Título" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_evento" class="form-label">Tipo evento</label>
                            <select name="tipo_evento" id="tipo_evento" class="form-control">
                                <option value="agendamento">Agendamento</option>
                                <option value="feriado">Feriado</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" value="1" name="allDay" type="checkbox" role="switch" id="flexSwitchCheckAllDay" disabled>
                                <label class="form-check-label" for="flexSwitchCheckAllDay">Dia todo</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <label for="data" class="form-label">Data</label>
                                <input type="date" name="data" id="data" class="form-control" required>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="horario" class="form-label">Horário</label>
                                <select name="horario" id="horarios" class="form-control"></select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição <span class="text-secondary">(opcional)</span></label>
                            <textarea name="description" id="descricao" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="eventModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        <b>Título: </b><span id="event_title"></span><br>
                        <b>Data: </b><span id="event_start"></span><br>
                        <b>Tipo evento: </b><span id="event_type"></span><br>
                        <b>Descrição: </b><span id="event_description"></span><br>
                        <b>Dia todo: </b><span id="ask_all_day"></span><br>
                    </p>
                </div>
                <div class="modal-footer d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <a href="edita_agendamento.html" id="editaAgendamento" class="btn btn-primary">Editar</a>
                    <a href="deleta_agendamento.html" id="deletaAgendamento" class="btn btn-danger">Deletar</a>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

