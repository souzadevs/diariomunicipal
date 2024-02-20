@php

use Carbon\Carbon;

@endphp

<!DOCTYPE html>
<html lang="pt-BR">
<!--begin::Head-->

<head>
    <title>DOM - Diário Oficial Municipal </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/assets/plugins/custom/font-awesome-5/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@500&display=swap"
        rel="stylesheet">

    <style>
        /* Estilo da barra de rolagem */
        ::-webkit-scrollbar {
            width: 12px;
        }

        /* Estilo do botão de rolagem (o "cabo" na barra de rolagem) */
        ::-webkit-scrollbar-thumb {
            background-color: #007bff;
            /* Cor do botão de rolagem */
            border-radius: 10px;
            /* Raio de borda do botão de rolagem */
        }

        /* Estilo da área de trilha da barra de rolagem */
        ::-webkit-scrollbar-track {
            background-color: #f1f1f1;
            /* Cor da área de trilha da barra de rolagem */
        }

        .header {
            border-bottom: 1px solid #e6e6e6;
        }

        .banner-image {
            height: 300px;
            object-fit: cover;
        }

        .titulo-cidade {
            font-weight: 500;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            color: #404040;
        }

        .titulo-cidade-nome {
            font-weight: 900;
            font-size: 28px;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            color: #404040;
        }

        .logo {
            height: 100px;
            widows: auto;
        }

        .logo-footer {
            height: 150px;
            widows: auto;
        }

        .botao-shadow:hover {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.329) !important;
        }

        .ultimos-diarios-item {
            transition: .1s linear;
        }

        .ultimos-diarios-item:hover {
            cursor: pointer !important;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.329) !important;
        }

        .nav-item {
            transition: .1s linear;
            border-bottom: 4px solid rgba(38, 76, 146, 0);
            font-weight: 700;
            font-family: "Montserrat", sans-serif;
        }

        .nav-item:hover {
            border-bottom: 4px solid #3271e6;
        }

        .ultimas-noticias-icon {
            font-size: 32px;
        }

        .ultimas-noticias-label-1 {
            font-weight: 900;
            font-size: 28px;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            color: #5e5e5e;
        }

        .ultimas-noticias-label-2 {
            font-weight: 500;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            color: #636363;
        }

        .ultimas-noticias-label-3 {
            font-size: 13px;
            font-weight: 500;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            color: #636363;
        }

        .shadow-light {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.13) !important;
        }

        .border-none-important {
            border: none !important;
        }

        label {
            font-weight: 500;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            color: #636363;
        }

        .section-label {
            font-weight: 800;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        .diario-item-download-wrapper {}

        .footer-label {
            color: #5e5e5e;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body>
    <header class="container-fluid bg-white header">
        <div class="row p-3">
            <div class="col-md-1"></div>
            <div class="col-12 p-0  col-md-1 d-flex justify-content-center align-items-center">
                <img class="logo" src="/assets/images/logo.jpeg" alt="404" srcset="">
            </div>
            <div class="col-12 p-0 col-md-8 ">
                <div class="container-fluid h-100">
                    <div class="row h-100">
                        <div class="col d-flex justify-content-center align-items-start flex-column">
                            <div class="titulo-cidade">
                                DIÁRIO OFICIAL DE
                            </div>
                            <div class="titulo-cidade-nome">
                                SÃO JOSÉ DO DIVINO - MG
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-2 title-cidade-nome d-flex justify-content-center align-items-center">
                <button class="btn btn-outline-primary botao-shadow rounded-pill w-75"
                    onclick="window.location.href = '/auth/sign-in/'">
                    <b> <i class="fas fa-user"></i> Entrar</b>
                </button>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse pl-5" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">PRINCIPAL <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">TODOS OS DIÁRIOS <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        INSTITUCIONAL
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <section class="container-fluid">
        <div class="row">
            <div class="col p-0">
                <article class="container-fluid">
                    <div class="row">
                        <div class="col p-0">
                            <div id="carrossel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carrossel" data-slide-to="0" class="active"></li>
                                    <li data-target="#carrossel" data-slide-to="1"></li>
                                    <li data-target="#carrossel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="/assets/images/banner1.png" class="d-block w-100 banner-image"
                                            alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/assets/images/banner2.png" class="d-block w-100 banner-image"
                                            alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/assets/images/banner3.png" class="d-block w-100 banner-image"
                                            alt="404">
                                    </div>
                                    {{-- <div class="carousel-item">
										<img src="..." class="d-block w-100" alt="...">
									</div>
									<div class="carousel-item">
										<img src="..." class="d-block w-100" alt="...">
									</div> --}}
                                </div>
                                <a class="carousel-control-prev" href="#carrossel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carrossel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <section class="container-fluid">
        <div class="row">
            <div class="col p-0">
                <article class="container-fluid">
                    <div class="row mt-5">
                        <div class="col p-0 col-md-1">
                        </div>
                        <div class="col p-0 col-md-1 d-flex justify-content-center align-items-center">
                            <div class="shadow-light ultimas-noticias-icon d-flex justify-content-center align-items-center text-primary rounded-circle"
                                style="width:80px; height:80px; background-color:#f4f4f4">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div
                                class="titulo-ultimas-noticias d-flex justify-content-center align-items-start flex-column">
                                <span class="ultimas-noticias-label-1">
                                    PESQUISAR NO DIÁRIO
                                </span>
                                <span class="ultimas-noticias-label-2">
                                    TEXTO, EDIÇÃO OU PERÍODO
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="container-fluid">
                                <div class="row mt-3">
                                    <div class="col p-0 col-md-1">
                                    </div>
                                    <div class="col col-md-11 d-flex justify-content-center align-items-center">
                                        <div class="pesquisa-wrapper w-100 h-100 bg-light shadow-light pl-3 pr-3 pt-4 pb-5"
                                            style=" border-radius: 30px;">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col col-md-4 text-center">
                                                        <button id="botao-texto"
                                                            class="btn btn-primary w-100 rounded-pill botao-shadow">TEXTO</button>
                                                    </div>
                                                    <div class="col col-md-4 text-center">
                                                        <button id="botao-edicao"
                                                            class="btn btn-outline-primary w-100 rounded-pill botao-shadow">EDIÇÃO</button>
                                                    </div>
                                                    <div class="col col-md-4 text-center">
                                                        <button id="botao-periodo"
                                                            class="btn btn-outline-primary w-100 rounded-pill botao-shadow">PERÍODO</button>
                                                    </div>
                                                </div>
                                                <hr class="mt-4 mb-5">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="container-fluid">
                                                            <div class="row filtro-periodo">
                                                                <div class="col" id="periodo">
                                                                    <label for="" id="label-periodo"
                                                                        class="font-weight-bold ml-4 muted">Caso
                                                                        queira, informe a
                                                                        data inicial</label>
                                                                    <input type="date"
                                                                        class="form-control rounded-pill border-none-important shadow-light"
                                                                        name="data_inicial" id="data_inicial">

                                                                </div>
                                                                <div class="col" id="periodo">
                                                                    <label for="" id="label-periodo"
                                                                        class="font-weight-bold ml-4 muted">Caso
                                                                        queira, informe a
                                                                        data final</label>
                                                                    <input type="date"
                                                                        class="form-control rounded-pill border-none-important shadow-light"
                                                                        name="data_final" id="data_final">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3 filtro-texto" id="texto">
                                                                <div class="col">
                                                                    <label for="" id="label-texto"
                                                                        class="font-weight-bold ml-4 muted">Digite o
                                                                        texto a ser
                                                                        procurado</label>
                                                                    <input type="text" name="texto"
                                                                        class="form-control rounded-pill border-none-important shadow-light">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3 filtro-edicao d-none" id="edicao">
                                                                <div class="col">
                                                                    <label for="" id="label-edicao"
                                                                        class="font-weight-bold ml-4 muted">Digite o
                                                                        número da
                                                                        edição</label>
                                                                    <input type="number" name="edicao"
                                                                        class="form-control rounded-pill border-none-important shadow-light">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-5">
                                                    <div class="col text-center">
                                                        <button class="btn btn-primary w-50 rounded-pill shadow-light" onclick="searchDiaries()">
                                                            <div class="search-spinner d-none">
                                                                <div class="spinner-border" role="status">
                                                                    <span class="sr-only">Loading...</span>
                                                                  </div>
                                                            </div>
                                                            <div class="saerch-label">
                                                                <i class="fas fa-search"></i> Buscar
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 pr-5">
                            <div class="container-fluid">
                                <div class="row mt-3">
                                    <div class="col w-100 h-100 bg-light shadow-light pl-3 pr-3 pt-4 pb-5"
                                        style=" border-radius: 30px;">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="btn btn-primary rounded-pill w-100 section-label">
                                                        ÚLTIMOS DIÁRIOS
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-4 mb-4">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col" style="max-height: 350px; overflow-y:scroll">
                                                        @foreach ($diaries as $diary)
                                                            <div class="row mb-2">
                                                                <div class="col">
                                                                    <div class="ultimos-diarios-item w-100 shadow-light p-4"
                                                                        style="border-radius: 30px">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col col-md-10 p-0">
                                                                                    <span
                                                                                        class="ultimos-diarios-item-title font-weight-bold">
                                                                                        {{$diary->edition}}ª Edição de 
                                                                                        
                                                                                        {{
                                                                                            Carbon::parse($diary->published_at)
                                                                                                ->locale('pt-BR')
                                                                                                ->translatedFormat('d F Y')
                                                                                        }}
                                                                                    </span>
                                                                                    <br>
                                                                                    <span
                                                                                        class="ultimos-diarios-item-size text-secondary">
                                                                                        Tamanho do arquivo: 0.8 mb
                                                                                    </span>
                                                                                </div>
                                                                                <div
                                                                                    class="col col-md-2 p-0 d-flex justify-content-center align-items-center">
                                                                                    <div class="diario-item-download-wrapper rounded-circle d-flex justify-content-center align-items-center"
                                                                                        style="height: 30px;width:30px">
                                                                                        <i
                                                                                            class="fas fa-download h5 text-primary"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <section class="container-fluid">
        <div class="row">
            <div class="col">
                <article class="container-fluid mb-5">
                    <div class="row mt-5">
                        <div class="col-md-1"></div>
                        <div class="col-md-10" style="border-top: 1px solid rgb(236, 236, 236)"></div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row pt-5">
                        <div class="col p-0 col-md-1">
                        </div>
                        <div class="col p-0 col-md-1 d-flex justify-content-center align-items-center">
                            <div class="shadow-light ultimas-noticias-icon d-flex justify-content-center align-items-center text-primary rounded-circle"
                                style="width:80px; height:80px; background-color:#f4f4f4">
                                <i class="fas fa-newspaper"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div
                                class="titulo-ultimas-noticias d-flex justify-content-center align-items-start flex-column">
                                <span class="ultimas-noticias-label-1">
                                    DIÁRIO DO DIA
                                </span>
                                <span class="ultimas-noticias-label-2">
                                    3407ª Edição de 19 de Fevereiro de 2024 (1484 downloads)
                                </span>
                                <span class="ultimas-noticias-label-3">
                                    Clique abaixo para baixar
                                </span>
                            </div>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </section>
    <footer class="container-fluid pb-5 bg-light">
        <div class="row  pt-5">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <div class="container-fluid">
                    <div class="row" style="border-bottom: 1px solid rgb(216, 216, 216)">
                        <div class="col">
                            <div class="section-label footer-label">
                                Diário Oficial
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <a href="" target="_blank" class="text-decoration-none">Principal</a>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <a href="" target="_blank" class="text-decoration-none">Todos os Diários</a>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <a href="" target="_blank" class="text-decoration-none">Legislação Aplicada</a>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <a href="" target="_blank" class="text-decoration-none">Emitir DAM</a>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <a href="" target="_blank" class="text-decoration-none">Contato</a>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <a href="" target="_blank" class="text-decoration-none">Equipe</a>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <a href="" target="_blank" class="text-decoration-none">Ajuda</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="container-fluid">
                    <div class="row" style="border-bottom: 1px solid rgb(216, 216, 216)">
                        <div class="col">
                            <div class="section-label footer-label">
                                Portais
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <a href="" target="_blank" class="text-decoration-none">ORGÃOS E SECRETARIAS</a>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <a href="" target="_blank" class="text-decoration-none">SERVIÇOS</a>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <a href="" target="_blank" class="text-decoration-none">OUVIDORIA</a>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <a href="" target="_blank" class="text-decoration-none">E-SIC</a>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <a href="" target="_blank" class="text-decoration-none">PORTAL DA
                                TRANSPARÊNCIA</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container-fluid">
                    <div class="row" style="border-bottom: 1px solid rgb(216, 216, 216)">
                        <div class="col">
                            <div class="section-label footer-label">
                                São José do Divino - MG
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <div class="section-label footer-label">
                                <img class="logo-footer" src="/assets/images/logo_footer.jpeg" alt="404"
                                    srcset="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="container-fluid">
                                <div class="row mt-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <i class="fas fa-map-marked text-primary h3"></i>
                                    </div>
                                    <div class="col-md-10 d-flex justify-content-center align-items-center">
                                        <span>
                                            Praça Cel. Antônio Lopes,, nº S/N - Centro - CEP 39.848-000 - São José do
                                            Divino - MG
                                        </span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <i class="fas fa-comments text-primary h3"></i>
                                    </div>
                                    <div class="col-md-10 d-flex justify-content-center align-items-center">
                                        <span>
                                            (33) 3582-1211 contato@camarasaojosedodivino.mg.gov.br
                                        </span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <i class="fas fa-clock text-primary h3"></i>
                                    </div>
                                    <div class="col-md-10 d-flex justify-content-center align-items-center">
                                        <span>
                                            Atendimento ao Público de Segunda a sexta da 8:00 às 16:00
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="/assets/plugins/custom/font-awesome-5/js/all.min.js"></script>

    <script>
        let selectedFilter = null;

        $("#botao-texto").click(function() {
            selectFilterOption('texto');
        })

        $("#botao-edicao").click(function() {
            selectFilterOption('edicao');
        })

        $("#botao-periodo").click(function() {
            selectFilterOption('periodo');
        })

        function selectFilterOption(option) {

            selectedFilter = option;

            $("#texto, #label-texto").addClass("d-none");
            $("#edicao, #label-edicao").addClass("d-none");
            // $("#periodo, #label-periodo").addClass("d-none");

            $("#" + option + ", #label-" + option).removeClass("d-none");

        }

        function searchDiaries() {

            $("#saerch-spinner").removeClass("d-none");
            $("#search-label").addClass("d-none");

            $.ajax({
                method: 'GET',
                dataType: 'json',
                data: {
                    'filter_type': selectedFilter,
                    'data_inicial': $("input[name='data_inicial']").val(),
                    'data_final': $("input[name='data_final']").val(),
                    'texto': $("input[name='texto']").val(),
                    'edicao': $("input[name='edicao']").val(),
                }
            }).then(response => {
                console.log('response')
                console.log(response)
                $("#saerch-diraries-spinner").addClass("d-none");
                $("#search-label").removeClass("d-none");
            }).catch(response => {
                console.log('catch')
                console.log(response);
                $("#saerch-diraries-spinner").addClass("d-none");
                $("#search-label").removeClass("d-none");
            })

        }
        
    </script>
</body>
<!--end::Body-->

</html>
