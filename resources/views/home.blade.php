@extends('layouts.app')

@section ('conteudo')

<section class="hero">
    <h2>Crie sua arte. Agende seu momento</h2>
    <a href="{{ url('/login') }}" class="btn btn-primary" style="width: fit-content;">Começar agora</a>
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

        <div class="about-image">
            <img src="{{ asset('images/o_que_e_nailbar.jpg') }}" alt="Nail Design">
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