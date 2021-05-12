@extends('layouts.app')

@section('content')
    <section class="container-fluid gb_content">
        @include('partials.sidebar')
        <div class="gb_content_page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-5 text-center">
                        <h1 class="gb_title">Ve&iacute;culos</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table gb-table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="150">#</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Placa</th>
                                    <th>KM</th>
                                    <th>Loja</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vehicles as $vehicle )
                                    <tr>
                                        <td>{{ $vehicle->codigo }}</td>
                                        <td>{{ $vehicle->marca }}</td>
                                        <td>{{ $vehicle->modelo }}</td>
                                        <td>{{ $vehicle->placa }}</td>
                                        <td>{{ $vehicle->kmdia }}</td>
                                        <td>
                                            @switch($vehicle->lojacli)
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
                                                    Matriz
                                            @endswitch
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                Nenhum ve&iacute;culo encontrado.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            {{ $vehicles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
