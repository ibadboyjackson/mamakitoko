@extends('pages.template')
@section('title')
    Mama Kitoko
@stop
@section('style')
    <style>
        html, body{
            overflow-x: hidden;
        }
        .main-content-text p {
            color: #fff !important;
        }
    </style>
@stop
@section('content')
<!-- Banner -->
@include('admin.admin.messages')
@foreach($info as $infos)
<div class="main-content" style='background: url("{{ asset('images/') }}/{{ $infos->image }}"); background-position: center; background-size: cover '></div>
    <div class="main-content-text">
            <h1>{{ $infos->titre }}</h1>
            <p style="color: #fff !important;">{{ substr(html_entity_decode( strip_tags($infos->contenu)), 0, 200)}}</p>
@endforeach
        <a href="inscription">
            <button class="btn btn-primary">
                @guest
                    S'Inscrire
                @else
                    Tableau de Bord
                @endguest
            </button>
        </a>
    </div><!-- End Banner -->
<!-- Pages Sections -->
<section class="page-section">
    <div class="container"  data-aos="fade-up">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-6">
                <h1>Evenements à venir</h1>
                <p class="lead" style="font-size: 15px;">
                Nous organisons un événement entièrement dédié à la célébration de la beauté de la femme africaine.
                </p>
            </div>
        </div>
        <div class="row image-banner">
            @foreach($events as $event)
                <div class="col-md-6">
                    <div class="py-1 h-100 text-center">
                        <a href="event"><img src="{{ asset("images/$event->image") }}" alt=""  class="img-fluid anime"></a>
                        <div class="mt-2"> {{  date('j M, Y H:i',strtotime($event->event_date)) }} | Par {{ $event->author }}</div>

                        <div class="text-center mb-5 mt-4">
                            <h3>{{ $event->titre }}</h3>
                            <hr>
                            <a href="event"><button class="btn btn-primary btn-lg btn-black">En Savoir plus</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="banner">
        <div class="row">
            @foreach($post as $posts)
            <div class="col-md-12 banner-tp mt-md-5 mt-sm-5" style='background: url("{{ asset('images/') }}/{{ $posts->image }}"); background-position: center; background-attachment: fixed '>
                <div class="container">
                    <div class="main-content-text-2">
                            <h1>{{ $posts->titre }}</h1>
                            <p>{!!  $posts->contenu !!}</p>
                        @endforeach
                        <a href="{{ route('inscription') }}"><button class="btn btn-primary">Commencer</button></a>
                    </div><!-- End Banner -->
                </div>
            </div>
        </div>
    </div>
    <div class="banner-team bg-light">
        <div class="container">
            <div class="row image-banner">
                @foreach($contenus as $contenu)
                    <div class="col-md-6">
                        <div class="py-1 h-100 text-center">
                            <div class="text-center mt-5">
                                <h3>{{ $contenu->titre }}</h3>
                                <p>{!!  $contenu->contenu !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="news">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-6 mt-5">
                <h1>Les dernières news</h1>
            </div>
        </div>
        <div class="row image-banner">

            @foreach($medias as $media)
                <div class="col-md-6">
                    <div class="py-1 h-100 text-center">
                        <img src="{{ asset("img/$media->image") }}" alt="" width="579.98" height="554" class="img-fluid anime">
                        <div class="text-center mb-5 mt-4">
                            <h3 class="mb-2">{{ $media->titre }}</h3>
                            <button class="btn btn-primary btn-lg btn-black ">Afficher</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Team -->
<section class="bg-light team-section" id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">NOS MEMBRES</h2>
                <h3 class="section-subheading text-muted">Liste des membres du collectif Mama Kitoko.</h3>
            </div>
        </div>
        <div class="row">
            @foreach($members as $member)
            <div class="col-sm-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('img/encore/') }}/{{ $member->image }}" alt="">
                    <h4>{{ $member->nom }} {{ $member->prenom }}</h4>
                    <p class="text-muted">{{ $member->fonction }}</p>
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                            <a href="{{ $member->instagram }}" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ $member->facebook }}" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ $member->twitter }}" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">NOS PARTENAIRES</h2>
                <h3 class="section-subheading text-muted">Liste de nos partenaires.</h3>
            </div>
        </div>
        <div class="row">
            @foreach($partenaires as $partenaire)
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img class="img-fluid d-block mx-auto" src="{{ asset('img/logos/') }}/{{ $partenaire->image }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row my-5">
            <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted">Consulter la liste complete des partenaires du collectif Mama Kitoko.</p>
                <a href="{{ route('partner') }}"><button class="btn btn-primary btn-lg btn-black ">Afficher</button></a>
            </div>
        </div>
    </div>
</section>
<section>
@include('pages.inc.newsletter')
</section>
@stop
