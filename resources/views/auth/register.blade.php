@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-5 mt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8 gb-register-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mt-5 text-center">
                            <h1 class="gb_title">Cadastrar-se</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 my-5">
                            <form action="{{ route('register') }}" method="post" id="form_register">
                                @csrf
                                @include('components.alerts')
                                <div class="form-row">
                                    <div class="col-12 col-md-6 col-lg-6 form-group">
                                        <label for="name" class="form-label gb-label">Nome Completo</label>
                                        <input type="text" class="form-control gb-input" id="name" name="name"
                                            value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-4 col-lg-4 form-group">
                                        <label class="form-label w-100 gb-label">Sexo/Empresa</label>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="radio" id="gender_m" name="gender"
                                                value="1" checked>
                                            <label class="form-check-label gb-label" for="gender_m">Masculino</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="radio" id="gender_f" name="gender"
                                                value="2">
                                            <label class="form-check-label gb-label" for="gender_f">Feminino</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="radio" id="gender_e" name="gender"
                                                value="3">
                                            <label class="form-check-label gb-label" for="gender_e">Empresa</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3 form-group">
                                        <label for="cpf_cnpj" class="form-label gb-label">Cpf</label>
                                        <input type="text" class="form-control gb-input" id="cpf_cnpj" name="cpf_cnpj"
                                            value="{{ old('cpf_cnpj') }}" required>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3 form-group">
                                        <label for="rg" class="form-label gb-label">Rg</label>
                                        <input type="text" class="form-control gb-input" id="rg" name="rg"
                                            value="{{ old('rg') }}">
                                    </div>
                                    <div class="col-12 col-md-2 col-lg-2 form-group">
                                        <label for="birth_date" class="form-label gb-label">Data de Nascimento</label>
                                        <input type="text" class="form-control gb-input" id="birth_date" name="birth_date"
                                            value="{{ old('birth_date') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-4 col-lg-4 form-group">
                                        <label for="phone" class="form-label gb-label">Telefone</label>
                                        <input type="text" class="form-control gb-input" id="phone" name="phone"
                                            value="{{ old('phone') }}" minlength="14" maxlength="14" required>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4 form-group">
                                        <label for="mobile" class="form-label gb-label">Celular</label>
                                        <input type="text" class="form-control gb-input" id="mobile" name="mobile"
                                            value="{{ old('mobile') }}" minlength="14" maxlength="15" >
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4 form-group">
                                        <label for="email" class="form-label gb-label">E-mail</label>
                                        <input type="email" class="form-control gb-input" id="email" name="email"
                                            value="{{ old('email') }}" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-4 col-lg-4 form-group">
                                        <label for="zipcode" class="form-label gb-label">Cep</label>
                                        <input type="text" class="form-control gb-input" id="zipcode" name="zipcode"
                                            value="{{ old('zipcode') }}" minlength="9" maxlength="9" required>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4 form-group">
                                        <label for="state" class="form-label gb-label">Estado</label>
                                        <select class="form-control gb-input" id="state" name="state" required
                                            onload="$(this).val('{{ old('state') }}')">
                                            <option value="" selected>Selecione...</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PA">Pará</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4 form-group">
                                        <label for="city" class="form-label gb-label">Cidade</label>
                                        <input type="text" class="form-control gb-input" id="city" name="city"
                                            value="{{ old('city') }}" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-3 col-lg-3 form-group">
                                        <label for="district" class="form-label gb-label">Bairro</label>
                                        <input type="text" class="form-control gb-input" id="district" name="district"
                                            value="{{ old('district') }}" required>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3 form-group">
                                        <label for="address" class="form-label gb-label">Endereço</label>
                                        <input type="text" class="form-control gb-input" id="address" name="address"
                                            value="{{ old('address') }}" required>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3 form-group">
                                        <label for="number" class="form-label gb-label">N&uacute;mero</label>
                                        <input type="text" class="form-control gb-input" id="number" name="number"
                                            value="{{ old('number') }}" required>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3 form-group">
                                        <label for="complement" class="form-label gb-label">Complemento</label>
                                        <input type="text" class="form-control gb-input" id="complement" name="complement"
                                            value="{{ old('complement') }}" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 col-lg-6 form-group">
                                        <label for="password" class="form-label gb-label">Senha</label>
                                        <input type="password" class="form-control gb-input" id="password" name="password"
                                            required autocomplete="new-password">
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6 form-group">
                                        <label for="password_confirmation" class="form-label gb-label">Confirmar
                                            Senha</label>
                                        <input type="password" class="form-control gb-input" id="password_confirmation"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center mt-4">
                                        {!! NoCaptcha::display() !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center mt-5">
                                        <a href="{{ route('login') }}" class="btn btn-secondary">Voltar</a>
                                        <button type="submit" class="btn btn-success">Salvar</button>
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
