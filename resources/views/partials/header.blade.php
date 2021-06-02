<header class="container-fluid gb_header">
    <div class="row gb_header_top">
        <div class="col-12 col-lg">
            <div class="gb_image"></div>
        </div>
        <div class="col-12 col-lg-4 gb_contact">
            <div class="d-flex justify-content-center align-items-center flex-column flex-md-row">
                <div class="gb_phone">Telefone: (85) 4006-0006</div>
                <div class="gb_whatsapp">
                    <div class="gb_icon_whatsapp"></div>&nbsp;Whatsapp: (85) 98736-0298
                </div>
            </div>
            <small class="gb_hours">Seg a Sex, das 07:30 às 17:30 / Sáb, das 07:30 às 12:00</small>
        </div>
        <div class="col-12 col-lg d-flex align-items-center gb_search flex-column flex-md-row">
            <div class="gb_social mb-2 mb-md-0">
                <a href="//www.gerardobastos.com.br/#newsletter_gb" class="btn btn-news mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-tag align-middle mr-2">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                        <line x1="7" y1="7" x2="7.01" y2="7"></line>
                    </svg>
                    <span>Receba as melhores ofertas</span>
                </a>
            </div>
            <div class="gb_form_serarch">
                <form action="//www.gerardobastos.com.br/" method="get" class="gb-form-search">
                    <div class="input-group">
                        <input type="text" class="form-control gb-search" name="s" placeholder="Pesquisar..." required>
                        <div class="input-group-btn">
                            <button class="btn btn-search" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search align-middle">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>&nbsp;Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row gb_header_navbar">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg gb_navbar">
                <a class="navbar-brand" href="//www.gerardobastos.com.br">
                    <img class="gb_logo" src="{{ asset('images/logo.webp') }}" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#gb_navbar"
                    aria-controls="gb_navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="gb_navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="//www.gerardobastos.com.br/institucional">Institucional <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="//www.gerardobastos.com.br/centro-automotivo">Centro
                                Automotivo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="//www.gerardobastos.com.br/gb-truck">GB Truck</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="//www.gerardobastos.com.br/gb-mall">GB Mall</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="//www.gerardobastos.com.br/distribuidora-de-pecas">Distribuidora
                                de
                                Peças</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="//www.gerardobastos.com.br/renovadora-de-pneus">Renovadora de
                                Pneus</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('auth.logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
