@extends('layouts.app')

@section('content')
    <section class="container-fluid gb_content">
        @include('partials.sidebar')
        <div class="gb_content_page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 my-5 text-center">
                        <h1 class="gb_title">Meus Dados</h1>
                    </div>
                </div>
                <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-12 col-md-6 col-lg-6 form-group">
                            <label for="user_name" class="form-label gb-label">Nome Completo</label>
                            <input type="text" class="form-control gb-input" id="user_name" value="{{ $user->name }}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-3 col-lg-3 form-group">
                            <label class="form-label w-100 gb-label">Sexo/Empresa</label>
                            <div class="form-check form-check-inline mt-1">
                                <input class="form-check-input" type="radio" id="user_gender_m" checked>
                                <label class="form-check-label gb-label" for="user_gender_m">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline mt-1">
                                <input class="form-check-input" type="radio" id="user_gender_f" disabled>
                                <label class="form-check-label gb-label" for="user_gender_f">Feminino</label>
                            </div>
                            <div class="form-check form-check-inline mt-1">
                                <input class="form-check-input" type="radio" id="user_gender_e" disabled>
                                <label class="form-check-label gb-label" for="user_gender_e">Empresa</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 form-group">
                            <label for="user_cpj_cnpj" class="form-label gb-label">Cpf</label>
                            <input type="text" class="form-control gb-input" id="user_cpj_cnpj" value="{{ $user->cpf_cnpj }}" readonly>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 form-group">
                            <label for="user_rg" class="form-label gb-label">Rg</label>
                            <input type="text" class="form-control gb-input" id="user_rg" value="{{ $user->rg }}" readonly>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 form-group">
                            <label for="user_cpj_cnpj" class="form-label gb-label">Data de Nascimento</label>
                            <input type="text" class="form-control gb-input" id="user_cpj_cnpj" value="{{ $user->birth_date }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-3 col-lg-3 form-group">
                            <label for="user_phone" class="form-label gb-label">Telefone</label>
                            <input type="text" class="form-control gb-input" id="user_phone" value="{{ $user->phone }}" readonly>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 form-group">
                            <label for="user_mobile" class="form-label gb-label">Celular</label>
                            <input type="text" class="form-control gb-input" id="user_mobile" value="{{ $user->mobile }}" readonly>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 form-group">
                            <label for="user_email" class="form-label gb-label">E-mail</label>
                            <input type="text" class="form-control gb-input" id="user_email" value="{{ $user->email }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-4 col-lg-4 form-group">
                            <label for="user_zipcode" class="form-label gb-label">Cep</label>
                            <input type="text" class="form-control gb-input" id="user_zipcode" value="{{ $user->zipcode }}" readonly>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 form-group">
                            <label for="user_state" class="form-label gb-label">Estado</label>
                            <input type="text" class="form-control gb-input" id="user_state" value="{{ $user->state }}" readonly>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 form-group">
                            <label for="user_city" class="form-label gb-label">Cidade</label>
                            <input type="text" class="form-control gb-input" id="user_city" value="{{ $user->county }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-3 col-lg-3 form-group">
                            <label for="user_district" class="form-label gb-label">Bairro</label>
                            <input type="text" class="form-control gb-input" id="user_district" value="{{ $user->district }}" readonly>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 form-group">
                            <label for="user_address" class="form-label gb-label">Endereço</label>
                            <input type="text" class="form-control gb-input" id="user_address" value="{{ $user->address }}" readonly>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 form-group">
                            <label for="user_number" class="form-label gb-label">N&uacute;mero</label>
                            <input type="text" class="form-control gb-input" id="user_number" value="{{ $user->number }}" readonly>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 form-group">
                            <label for="user_complement" class="form-label gb-label">Cidade</label>
                            <input type="text" class="form-control gb-input" id="user_complement" value="{{ $user->complement }}" readonly>
                        </div>
                    </div>
                </form>
            </div>
    </section>
@endsection
