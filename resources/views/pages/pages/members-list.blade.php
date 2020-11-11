@extends('pages.template')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/members.css') }}">
@stop
@section('title')
    Membres | Mama Kitoko
@stop
@section('content')
    <section class="bg-light team-section" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Liste des MEMBRES</h2>
                    <h3 class="section-subheading text-muted">Membres / Catégorie / {{ $category->name }}</h3>
                </div>
            </div>
            <div class="row mb-5">
                @foreach($members as $member)
                    <div class="col-md-4 mb-5">
                        <div class="section" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="{{ asset("img/encore/$member->image") }}" alt="{{ $member->prenom }}" style="width: 100%; height: auto">
                            <div class="my-3 text-center">
                                <strong>{{ $member->nom }} {{ $member->prenom }}</strong>
                                <p>
                                    {{ $category->name }}
                                </p>
                                <a href="{{ route('member.profile', ['name' => $member->nom, 'id' => $member->id]) }}"><button class="btn btn-primary btn-lg btn-black" style="border-radius: 5px">Profile</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
