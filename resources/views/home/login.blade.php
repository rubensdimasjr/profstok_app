@extends('home.master')

@section('content')

<div class="container my-5">
    <div class="row">
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
        <div class="col-12 col-lg-6 px-4 py-5" style="height:500px;">
            <img src="{{ asset('assets/images/image_login.svg') }}" alt="Hero 1" width="100%" height="100%">
        </div>
        <div class="col-12 col-lg-4 col-md-6 px-4 py-5 mx-auto">
            <h1 class="text-center mb-3 text-muted">Realize o login!</h1>
            <form action="{{ route('login.autenticate') }}" method="post">
                @csrf
                <!-- INPUT EMAIL -->
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" id="floatingInputEmail" placeholder="E-mail" required>
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
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingInputPassword" placeholder="Senha" required>
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
                    <button type="submit" class="btn btn-primary btn-lg px-4 gap-3">Entrar</button>
                    <a href="{{ route('login.register') }}" class="btn btn-outline-secondary btn-lg px-4">Cadastrar</a>
                </div>
            </form>
            <div class="mb-3 text-center">
                <a href="#" class="text-muted">Esqueceu sua senha?</a>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

