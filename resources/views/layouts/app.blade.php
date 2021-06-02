<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gerardo Bastos') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Google Captch -->
    {!! NoCaptcha::renderJs() !!}
</head>

<body>
    <div class="wrapper">
        @include('partials.header')
        <main class="gb_main">

            @yield('content')

            @include('partials.service')
        </main>
        <footer class="gb_footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-4 text-center">
                        <img src="{{ asset('images/logo-white.webp') }}" width="200">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <h3 class="text-white mb-4">Institucional</h3>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <ul class="gb_footer_list">
                                    <li><a href="#" class="text-link">A Empresa</a></li>
                                    <li><a href="#" class="text-link">Nossas Lojas</a></li>
                                    <li><a href="#" class="text-link">Missão e Valores</a></li>
                                    <li><a href="#" class="text-link">Minha Conta</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <ul class="gb_footer_list">
                                    <li><a href="#" class="text-link">Centro automotivo</a></li>
                                    <li><a href="#" class="text-link">Politicas do Site</a></li>
                                    <li><a href="#" class="text-link">Central de Atendimento</a></li>
                                    <li><a href="#" class="text-link">Trabalhe Conosco</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 text-center mt-3 mt-mb-0">
                        <h2 class="text-white font-weight-bold mb-0">Seja o primeiro a saber</h2>
                        <p class="text-white">Assine nossa newsletter e receba conteúdo exclusivo sobre o tema</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center mt-5 d-flex align-items-center justify-content-center">
                        <div class="gb_footer_powerby">
                            <img src="{{ asset('images/logo-gray.webp') }}" width="143">
                        </div>
                        <div class="gb_footer_copyright">
                            <p class="mb-0 text-white">Todos os direitos reservados &copy; Gerardo Bastos | Telefone: <span style="color: #ffffff;"><a style="color: #ffffff;" href="tel:854006-0006">(85) 4006-0006</a></span> – Whatsapp: <span style="color: #ffffff;"><a style="color: #ffffff;" href="https://api.whatsapp.com/send?phone=5585987360298">(85) 98736-0298</a></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
