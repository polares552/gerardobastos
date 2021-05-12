@extends('layouts.app')

@section('content')
    <section class="container-fluid gb_content">
        @include('partials.sidebar')
        <div class="gb_content_page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-5 text-center">
                        <h1 class="gb_title">Alterar Senha</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-5 col-lg-5 mx-auto my-5">
                        <form action="{{ route('profile.password.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-12 col-md-12 col-lg-12 form-group">
                                    <label for="user_password_old" class="form-label gb-label">Senha Atual</label>
                                    <input type="password" class="form-control gb-input" id="user_password_old" name="user_password_old" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-12 col-lg-12 form-group">
                                    <label for="user_password_new" class="form-label gb-label">Nova Senha</label>
                                    <input type="password" class="form-control gb-input" id="user_password_new" name="user_password_new" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-12 col-lg-12 form-group">
                                    <label for="user_password_confirm" class="form-label gb-label">Confirmar Senha</label>
                                    <input type="password" class="form-control gb-input" id="user_password_confirm" name="user_password_confirm" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary gb-button-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection
