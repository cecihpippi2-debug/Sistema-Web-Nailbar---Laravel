@extends('layouts.app')

@section ('conteudo')

<section class="hero">
    <h2>Crie sua arte. Agende seu momento</h2>
    <a href="{{ url('/agendamentos') }}" class="btn btn-primary">Começar agora</a>
</section>

<section class="about">
    <div class="about-container">

        <div class="about-text">
            <h2>O que é o Nail Bar?</h2>
            <p>
                O Nail Bar é uma experiência criativa onde você pode montar
                sua própria decoração de unhas online antes mesmo de chegar
                ao salão. Escolha cores, estilos, detalhes e transforme sua
                ideia em realidade.
            </p>
            <p>
                No Nail Bar cada unha é uma pequena obra de arte feita sob medida para você
            </p>
        </div>

        <!-- CARROSSEL COM BOOTSTRAP -->
        <div class="col-md-4">
            <div id="carouselNailBar" class="carousel slide carousel-custom" data-bs-ride="carousel">
                <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/nailbar1.jpg') }}" class="d-block w-100 rounded" alt="">
                        </div>

                        <div class="carousel-item">
                            <img src="{{ asset('images/nailbar2.jpg') }}" class="d-block w-100 rounded" alt="">
                        </div>

                        <div class="carousel-item">
                            <img src="{{ asset('images/nailbar3.jpg') }}" class="d-block w-100 rounded" alt="">
                        </div>

                    </div>

                    <!-- BOTÕES -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselNailBar" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselNailBar" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>
            </div>
    </div>
</section>


<section class="about">
    <div class="about-container">

        <!-- CARROSSEL (AGORA À ESQUERDA) -->
        <div class="col-md-4">
            <div id="carouselEspaco" class="carousel slide carousel-espaco" data-bs-ride="carousel">
                
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="{{ asset('images/espaco2.jpg') }}" class="d-block w-100 rounded" alt="">
                    </div>

                    <div class="carousel-item">
                        <img src="{{ asset('images/espaco1.jpg') }}" class="d-block w-100 rounded" alt="">
                    </div>

                </div>

                <!-- BOTÕES -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselEspaco" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselEspaco" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

            </div>
        </div>

        <!-- TEXTO (AGORA À DIREITA) -->
        <div class="about-text">
            <h2>Nosso Espaço</h2>
            <p>
                Nosso Nail Bar foi pensado para oferecer conforto, beleza e bem-estar
                em cada detalhe. Um ambiente moderno, acolhedor e preparado para
                proporcionar uma experiência única.
            </p>
            <p>
                Aqui você relaxa, se cuida e sai ainda mais confiante, com um
                atendimento personalizado e um espaço feito especialmente para você.
            </p>
        </div>

    </div>
</section>

<section class="video-section">
    <div class="video-content">

        <div class="about-text">
            <h2>Video tutorial</h2>

        </div>

        <div class="video-placeholder">
            Em breve você poderá assistir ao tutorial aqui!
            <!--
            <iframe width="100%" height="100%" 
                src="LINK_DO_YOUTUBE"
                title="Video Tutorial"
                frameborder="0"
                allowfullscreen>
            </iframe> 
            -->
        </div>

    </div>
</section>

@endsection