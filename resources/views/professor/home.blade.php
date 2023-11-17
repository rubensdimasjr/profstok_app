@extends('professor.master')

@section('content')

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <h1 class="h2 mt-4">Lista de professores</h1>

        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        </div>

        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach($professores as $professor)
              <tr>
                <td>{{ $professor->id }}</td>
                <td>{{ $professor->name }}</td>
                <td>{{ $professor->email }}</td>
                <td>
                    <button class="btn btn-primary">Editar</button>
                    <button class="btn btn-secondary">Deletar</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </main>

@endsection

