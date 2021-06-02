@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-5 mt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-lg-5 gb-register-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mt-5 text-center">
                            <h1 class="gb_title">Recuperar Senha</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 mx-auto my-5">
                            <form method="POST" action="{{ route('password.email') }}" id="form_password_link">
                                @csrf
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="alert alert-success fade show">
                                                <div class="d-flex justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="align-middle">
                                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                    </svg>
                                                </div>
                                                <p class="text-center mt-3"><b>SUCESSO!</b><br>{{ session('status') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @error('email')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="alert alert-danger">
                                                <div class="d-flex justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" class="align-middle">
                                                        <path
                                                            d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                                                        </path>
                                                        <line x1="12" y1="9" x2="12" y2="13"></line>
                                                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                                    </svg>
                                                </div>
                                                <p class="text-center mt-3"><b>OPS!</b><br>{{ $message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @enderror
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="email" class="form-label gb-label">E-mail</label>
                                        <input id="email" type="email" class="form-control gb-input" name="email"
                                            value="{{ old('email') }}" required autocomplete="off" autofocus>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a href="{{ route('login') }}" class="btn btn-secondary">Voltar</a>
                                        <button type="submit" class="btn btn-primary">
                                            Enviar link de redefinição de senha
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
