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
                    <h2 class="section-heading text-uppercase">NOS MEMBRES</h2>
                    <h3 class="section-subheading text-muted">Liste des membres du collectif Mama Kitoko.</h3>
                </div>
            </div>
            <div class="row mb-5">
              @foreach($categories as $category)
                    <div class="col-md-4 mb-5">
                        <div class="section" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="center-element">
                                <a href="{{ route('members.list', ['name' => $category->name, 'id' => $category->id]) }}" class="element-a">
                                    <h5>{{ $category->name }}</h5>
                                    <hr>
                                </a>
                            </div>
                            <a href="{{ route('members.list', ['name' => $category->name, 'id' => $category->id]) }}" class="image-block">
                                <img src="{{ asset("img/$category->image") }}" alt="" style="width: 100%; height: auto" class="real-image">
                            </a>
                        </div>
                  </div>
              @endforeach
            </div>
        </div>
    </section>
@stop
