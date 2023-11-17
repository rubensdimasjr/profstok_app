@extends('home.master')

@section('content')

<section id="index" class="row mt-3">
    <div class="col-12 col-md-6 px-4">
        <h1 class="fw-bold text-body-emphasis">Bem-vindo ao PROFSTOK!</h1>
        <p class="lead mb-4">Seja você um docente, colaborador ou estudante, agora é mais fácil do que nunca agendar e
            gerenciar itens no almoxarifado da nossa instituição. Nosso sistema de agendamento simplifica o processo,
            economizando seu tempo e garantindo que os recursos necessários estejam sempre à sua disposição.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-start justify-content-center">
            <a href="https://github.com/rubensdimasjr/profstok" target="_blank" class="btn btn-outline-secondary btn-lg px-4 d-flex align-items-center">
                <svg class="bi bi-github me-2 theme-icon" width="1.5em" height="1.5em">
                    <use href="#github"></use>
                </svg>
                Github
            </a>
        </div>
    </div>
    <div class="col-12 col-md-6 px-4 mb-0 mb-sm-5" style="height:500px;">
        <img src="{{ asset('assets/images/hero1.svg') }}" alt="Hero 1" width="100%" height="100%">
    </div>
</section>
<section id="objetivo" class="row mb-5">
    <div class="col-12 col-md-6 px-4 mx-auto text-center">
        <h1 class="fw-bold text-body-emphasis">Objetivo</h1>
        <p class="lead">
            O projeto surgiu com o objetivo principal de criar uma solução que otimize o uso dos recursos da sala dos
            professores, reduzindo conflitos de horários e garantindo que os itens estejam disponiveis quando necessário.
        </p>
    </div>
</section>
<section id="objetivo_especifico" class="row mb-5">
    <div class="col-12 col-md-6 px-4">
        <img src="{{ asset('assets/images/hero2.svg') }}" alt="Hero 2" width="100%" height="100%">
    </div>
    <div class="col-12 col-md-6 px-4 py-5">
        <h1 class="fw-bold text-body-emphasis">Objetivos específicos</h1>
        <p class="lead mb-4">
            Este projeto propõe o desenvolvimento de um sistema informatizado que visa melhorar a gestão de recursos na
            sala dos professores, tomando o processo de retirada e devolução de itens mais eficiente e organizado. O
            sistema permitirá que professores agendem facilmente a retirada dos itens pedagógicos.
        </p>
    </div>
</section>


@endsection

