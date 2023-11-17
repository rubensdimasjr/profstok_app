@extends('home.master')

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-12 col-lg-4 col-md-6 px-4 py-5 mx-auto">
            <h1 class="text-center mb-3 text-muted">Realize seu cadastro!</h1>
            <form action="{{ route('login.store') }}" method="post">
                @csrf
                <!-- INPUT NOME -->
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputNome" placeholder="Nome" name="name" required>
                            <label for="floatingInputNome">Nome</label>
                        </div>
                    </div>
                </div>
                <!-- FIM INPUT NOME -->
                <!-- INPUT EMAIL -->
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInputEmail" placeholder="E-mail" name="email" required>
                            <label for="floatingInputEmail">E-mail</label>
                        </div>
                    </div>
                </div>
                <!-- FIM INPUT EMAIL -->
                <!-- INPUT PASSWORD -->
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-file-lock"></i>
                        </span>
                        <div class="form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingInputPassword" placeholder="Senha" name="password" min="6" required>
                            <label for="floatingInputPassword">Senha</label>
                        </div>
                    </div>
                    @error('password')
                    <div class="py-1">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <!-- FIM INPUT PASSWORD -->
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-4">
                    <button type="submit" class="btn btn-primary btn-lg px-4 gap-3">Cadastrar</button>
                    <a href="{{ route('login.index') }}" class="btn btn-outline-secondary btn-lg px-4">Login</a>
                </div>
            </form>
        </div>
        <div class="col-12 col-lg-6 px-4 py-5 " style="height:500px;">
            <img src="{{ asset('assets/images/image_sign_up.svg') }}" alt="Hero 1" width="100%" height="100%">
        </div>
    </div>
</div>
</div>

@endsection

