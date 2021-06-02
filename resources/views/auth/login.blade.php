@extends('layouts.app')

@section('content')
    <section class="container-fluid gb_login">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <span class="align-middle">Área do Cliente</span>
                    </div>

                    <div class="card-body">
                        @error('email')
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-danger fade show text-white" role="alert">
                                        <div class="d-flex justify-content-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="align-middle">
                                                <path
                                                    d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                                                </path>
                                                <line x1="12" y1="9" x2="12" y2="13"></line>
                                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                            </svg>
                                        </div>
                                        <p class="text-center">{!! $message !!}</p>
                                    </div>
                                </div>
                            </div>
                        @enderror
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            {{-- <div class="row">
                                <div class="col-12 form-group d-flex justify-content-between">
                                    <label for="type" class="form-label text-secondary">Tipo de Documento</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="cpf" value="cpf"
                                                checked>
                                            <label class="form-check-label" for="cpf">CPF</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="cnpj" value="cnpj">
                                            <label class="form-check-label" for="cnpj">CNPJ</label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input id="email" type="email" class="form-control" name="email" value=""
                                        autocomplete="off" autofocus="" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="password" class="form-label">Senha</label>
                                    <input id="password" type="password" class="form-control" name="password" required=""
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">Lembrar de mim</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-login">
                                        Entrar
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-center">
                                    <a class="btn btn-link text-secondary" href="{{ route('password.request') }}">
                                        Esqueceu sua senha?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 gb_register">
                <p>ou</p>
                <h2 class="text-uppercase">Não é cadastrado?</h2>
                <p>Seja bem-vindo!<br>Para acessar preencha os campos corretamente.</p>
                <a href="{{ route('register') }}" class="btn btn-login">Criar Cadastro</a>
            </div>
        </div>
    </section>
@endsection
