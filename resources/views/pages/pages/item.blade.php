@extends('pages.template')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
@stop
@section('title')
    {{ $shop->titre }}
@stop
@section('content')
<section class="item-section">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-6 mb-3">
                <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="">
                    <ol class="carousel-indicators justify-content-center">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active justify-content-center">
                            <img class="d-block img-fluid" src="{{ asset("img/$shop->image") }}" alt="First slide">
                        </div>
                        <div class="carousel-item justify-content-center">
                            <img class="d-block img-fluid" src="{{ asset("img/$shop->image_1") }}" alt="Second slide">
                        </div>
                        <div class="carousel-item justify-content-center">
                            <img class="d-block img-fluid" src="{{ asset("img/$shop->image_2") }}" alt="Third slide">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 btn-class">
                <h1>{{ $shop->titre }}</h1>
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                <h5 class="my-2" style="font-weight: bold; color: #c20707">{{ $shop->prix }} CHF</h5>
                <div class="form-group mt-2">
                    <label for="sel1">Quantité</label>
                    <select class="form-control control" name="qty" id="sel1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <a href="{{ route('panier.ajout', $shop->id) }}"><button class="btn btn-primary mb-3">Ajouter au panier</button></a>
                <p>{!!  $shop->description !!}</p>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="newsletter">
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/newsletter.jpg" data-speed="0.8"></div>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="newsletter_title">S'inscrire à notre newsletter</div>
                </div>
            </div>
            <div class="row newsletter_row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="newsletter_form_container">
                        <form action="#" id="newsleter_form" class="newsletter_form">
                            <input type="email" class="newsletter_input" placeholder="Votre Email" required="required">
                            <button class="newsletter_button">s'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
