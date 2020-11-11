@extends('pages.template')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@stop
@section('title')
    Membres | {{ $member->nom }}-{{ $member->prenom }}
@stop
@section('content')
    <div class="my-5">
        <div class="container">
            <div class="fb-profile">
                <img align="left" class="fb-image-lg" src="{{ asset("img/encore/$member->image_1") }}" alt="Profile image example"/>
                <img align="left" class="fb-image-profile thumbnail" src="{{ asset("img/encore/$member->image") }}" alt="Profile image example"/>
                <div class="fb-profile-text">
                    <h1>{{ $member->prenom }} {{ $member->nom }}</h1>
                    <p>{{ $member->category->name }}</p>
                    <p>Profile / Catégorie / {{ $member->category->name }}</p>
                </div>
            </div>
        </div> <!-- /container -->
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <p>{{ substr(html_entity_decode( strip_tags($member->description)), 0, 3000) }}</p>
            </div>
        </div>
    </div>
@stop
