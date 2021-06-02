@extends('layouts.app')

@section('content')
    <section class="container-fluid gb_content">
        @include('partials.sidebar')
        <div class="gb_content_page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 my-5">
                        <h1 class="gb_title">Pagamentos</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('payment.index') }}" method="get" accept-charset="utf-8">
                            <div class="form-row">
                                <div class="form-group col-12 col-md-3 col-lg-3">
                                    <label for="filter_type" class="form-label">Tipo</label>
                                    <select class="form-control" name="type" id="filter_type">
                                        <option value="" selected>Selecione</option>
                                        <option value="open" {{ old('type') == 'open' ? 'selected' : '' }}>Aberto</option>
                                        <option value="paid" {{ old('type') == 'paid' ? 'selected' : '' }}>Pago</option>
                                        <option value="expired" {{ old('type') == 'expired' ? 'selected' : '' }}>Vencidos
                                        </option>
                                        <option value="all" {{ old('type') == 'all' ? 'selected' : '' }}>Todos</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-3 col-lg-3">
                                    <label for="filter_start" class="form-label">Vencimento De</label>
                                    <input type="date" class="form-control" name="start" id="filter_start"
                                        value="{{ old('start') }}" />
                                </div>
                                <div class="form-group col-12 col-md-3 col-lg-3">
                                    <label for="filter_end" class="form-label">Vencimento At&eacute;</label>
                                    <input type="date" class="form-control" name="end" id="filter_end"
                                        value="{{ old('end') }}" />
                                </div>
                                <div class="form-group col-12 col-md-3 col-lg-3 text-right text-md-left">
                                    <label class="form-label w-100 d-none d-md-block">&nbsp;</label>
                                    <button type="submit" class="btn btn-primary">Filtrar</button>
                                    <a href="{{ route('payment.index') }}" class="btn btn-secondary">Redefinir</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3 table-responsive">
                        <table class="table gb-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Num. T&iacute;tulo</th>
                                    <th>Emiss&atilde;o</th>
                                    <th>Vencimento</th>
                                    <th>Valor (R&dollar;)</th>
                                    <th>Pago (R&dollar;)</th>
                                    <th>Data de Pagamento</th>
                                    <th class="text-center">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($payments as $payment )
                                    <tr>
                                        <td class="align-middle">{{ trim($payment->duplicata) ?? '--' }}</td>
                                        <td class="align-middle">
                                            {{ date('d/m/Y', strtotime(trim($payment->emissao))) ?? '--' }}</td>
                                        <td class="align-middle">
                                            {{ date('d/m/Y', strtotime(trim($payment->vencimento))) ?? '--' }}</td>
                                        <td class="align-middle">
                                            {{ number_format(floatval($payment->valor), 2, ',', '.') ?? '--' }}</td>
                                        <td class="align-middle">
                                            {{ number_format(floatval($payment->valor) + floatval('0' . $payment->juros), 2, ',', '.') ?? '--' }}
                                        </td>
                                        <td class="align-middle">
                                            {{ date('d/m/Y', strtotime(trim($payment->data_pagamento))) ?? '--' }}</td>
                                        <td class="text-center align-middle">
                                            @if (!empty($payment->data_pagamento))
                                                <span class="badge badge-success">Pago</span>
                                            @else
                                                <span class="badge badge-warning">Em aberto</span>
                                            @endif

                                            @if ((empty($payment->data_pagamento) && $payment->vencimento < $now) || (!empty($payment->data_pagamento) && $payment->vencimento < $payment->data_pagamento))
                                                <span class="badge badge-danger">Vencido</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            @if (empty($payment->data_pagamento))
                                                <a href="javascript:void(0);" class="btn btn-table" data-toggle="popover"
                                                    data-trigger="focus" data-placement="left"
                                                    data-content="{{ trim($payment->linha_digitavel) }}"
                                                    title="C&oacute;digo de barras">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-plus-circle align-middle">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="8" x2="12" y2="16"></line>
                                                        <line x1="8" y1="12" x2="16" y2="12"></line>
                                                    </svg>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center align-middle">
                                            Nenhum pagamento encontrado.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        @if (!empty($payments))
                            {{ $payments->links() }}
                        @endif
                    </div>
                </div>
            </div>
    </section>
@endsection
