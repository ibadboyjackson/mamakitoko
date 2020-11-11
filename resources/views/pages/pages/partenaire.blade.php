@extends('pages.template')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
@stop
@section('title')
    Partenaires | Mama Kitoko
@stop
@section('content')
    @include('admin.admin.messages')
    <header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto" data-aos="fade-up">
                    <h1 class="mb-5">#Mama Kitoko | Nos Partenaires</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">

                </div>
            </div>
        </div>
    </header>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">NOS PARTENAIRES</h2>
                <h3 class="section-subheading text-muted">Ils nous font confiance</h3>
            </div>
        </div>
        <div class="row mb-5">
            @foreach($partenaires as $partenaire)
                <div class="col-md-3 col-sm-6 section-part">
                    <a href="#">
                        <img class="img-fluid d-block mx-auto" src="{{ asset("img/logos/$partenaire->image") }}" alt="">
                    </a>
                </div>
         @endforeach
        </div>
    </div>
</section>
<section>
    @include('pages.inc.newsletter')
</section>
@stop
