@extends('layouts.app')

@section('content')
    <section class="container-fluid gb_content">
        @include('partials.sidebar')
        <div class="gb_content_page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0">
                        <img src="{{ asset('images/banner_home.png') }}" class="gb_banner" alt="GB+" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 py-5 text-center">
                        <a href="http://www.gerardobastos.com.br/wp-content/uploads/termos-de-uso-PF.pdf" target="__blank"
                            class="btn btn-rule">Confira o regulamento</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 py-2 text-center">
                        <h1 class="gb_sale">
                            <span data-toggle="tooltip"
                                title="Saldo GB+ disponivel">R&dollar;&nbsp;{{ $saldo ?? '0,00' }}</span>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="gb_info m-0">Os cr&eacute;ditos adquiridos podem ser utilizados em servi&ccedil;os.</p>
                        <p class="gb_info m-0">O b&ocirc;nus do Clube de Vantagens ser&aacute; registrado por CPF,
                            sendo<br />v&aacute;lido
                            apenas para pessoas f&iacute;sicas.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mt-5 text-center">
                        <h1 class="gb_title">Hist&oacute;rico</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table gb-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Data</th>
                                    <th>Nota Fiscal</th>
                                    <th>Valor da Nota</th>
                                    <th>Filial</th>
                                    <th>Cr&eacute;dito</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>22/02/2021</td>
                                    <td>4565434d5</td>
                                    <td>2.565,55</td>
                                    <td>Centro</td>
                                    <td>23,02</td>
                                </tr>
                                <tr>
                                    <td>22/02/2021</td>
                                    <td>4565434d5</td>
                                    <td>2.565,55</td>
                                    <td>Centro</td>
                                    <td>23,02</td>
                                </tr>
                                <tr>
                                    <td>22/02/2021</td>
                                    <td>4565434d5</td>
                                    <td>2.565,55</td>
                                    <td>Centro</td>
                                    <td>23,02</td>
                                </tr>
                                <tr>
                                    <td>22/02/2021</td>
                                    <td>4565434d5</td>
                                    <td>2.565,55</td>
                                    <td>Centro</td>
                                    <td>23,02</td>
                                </tr>
                                <tr>
                                    <td>22/02/2021</td>
                                    <td>4565434d5</td>
                                    <td>2.565,55</td>
                                    <td>Centro</td>
                                    <td>23,02</td>
                                </tr>
                                <tr>
                                    <td>22/02/2021</td>
                                    <td>4565434d5</td>
                                    <td>2.565,55</td>
                                    <td>Centro</td>
                                    <td>23,02</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
