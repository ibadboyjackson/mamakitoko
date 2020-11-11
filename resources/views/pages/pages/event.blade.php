@extends('pages.template')
@section('title')
    Event | Mama Kitoko
@stop
@section('content')
<!-- Page Content -->
@include('admin.admin.messages')
<div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block img-fluid" src="{{ asset('images/item-1.jpeg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h1> #I am The First Caption For Test</h1>
                <p class="pb-2">This is my first paragraph just for testing this</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="{{ asset('images/item-4.jpeg') }}" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h1> #I am The First Caption For Test</h1>
                <p class="pb-2">This is my first paragraph just for testing this</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="{{ asset('images/item-3.jpeg') }}" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h1> #I am The First Caption For Test</h1>
                <p class="pb-2">This is my first paragraph just for testing this</p>
            </div>
        </div>
    </div>
</div>
<section class="events">
    <div class="container">
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-12 my-4 image-envent">
                    <img src="{{ asset("images/$event->image") }}" alt="" width="100%" height="100%">
                </div>
                <div class="col-md-12 justify-content-center text-center mb-5">
                    <h1>{{ $event->titre }}</h1>
                    <p class="date">events/ {{ date('j M, Y',strtotime($event->event_date)) }}/ Par {{ $event->author }}</p>
                    <p class="my-5">{!! $event->contenu !!}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section>
    @include('pages.inc.newsletter')
</section>
@stop
