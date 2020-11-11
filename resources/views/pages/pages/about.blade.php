@extends('pages.template')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
@stop
@section('title')
    A propos | Mama Kitoko
@stop
@section('content')
    @include('admin.admin.messages')
    <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5"># A propos de Mama Kitoko</h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">

            </div>
        </div>
    </div>
</header>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">A propos</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    @foreach($abouts as $about)
                        <li>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="img/about/{{ $about->image }}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>{{ $about->date }}</h4>
                                    <h4 class="subheading">{{ $about->titre }}</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">{!! $about->contenu !!}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Contact -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Nous Contacter</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('post.email.post') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" name="name" type="text" placeholder="Votre Name *" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" type="email" placeholder="Votre Email *" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="phone" type="tel" placeholder="Téléphone *" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Votre Message *" required="required"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button class="btn btn-primary btn-xl text-uppercase" type="submit">Evoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop
