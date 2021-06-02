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
                                    <th>Ordem</th>
                                    <th>Nota Fiscal</th>
                                    <th>Valor da Nota</th>
                                    <th>Filial</th>
                                    <th>Data</th>
                                    <th>Cr&eacute;dito</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($history as $h)
                                    <tr>
                                        <td>{{ $h->zh_ordem ?? '--' }}</td>
                                        <td>{{ preg_replace('/\s+/', '', trim($h->zh_invoice)) ?? '--' }}</td>
                                        <td>{{ number_format(floatval(substr(trim($h->zh_invoice_value), 0, -2) . '.' . substr(trim($h->zh_invoice_value), -2)), 2, ',', '.') ?? '--' }}
                                        </td>
                                        <td>
                                            @switch(trim($h->zh_filorig))
                                                @case('01')
                                                    Matriz
                                                @break
                                                @case('F1')
                                                    Antônio Sales
                                                @break
                                                @case('F2')
                                                    Barão
                                                @break
                                                @case('F3')
                                                    São Paulo
                                                @break
                                                @case('F4')
                                                    Rogaciano Leite
                                                @break
                                                @case('F5')
                                                    Maracanau
                                                @break
                                                @case('F6')
                                                    Parangaba
                                                @break
                                                @case('F7')
                                                    Messejana
                                                @break
                                                @case('F8')
                                                    Rio Mar
                                                @break
                                                @default
                                                    --
                                            @endswitch
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime(trim($h->zh_data))) ?? '--' }}</td>
                                        <td>{{ number_format(floatval($h->zh_credit), 2, ',', '.') ?? '--' }}</td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Nenhum resultado foi encontrado!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            @if (!empty($history))
                                {{ $history->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
