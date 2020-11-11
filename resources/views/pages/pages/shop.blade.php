@extends('pages.template')
@section('title')
    Shop | Mama Kitoko
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
            @foreach($tops as $top)
                <div class="carousel-item {{ $top->class }}">
                    <img class="d-block img-fluid" src="{{ asset("img/$top->image") }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>{{ $top->titre }}</h1>
                        <p class="pb-2">{!! $top->description !!}</p>
                        <a href="{{ route('panier.ajout', $top->id) }}"><button class="btn btn-primary">Acheter</button></a>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-5">
                    @foreach($shops as $shop)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100"  data-aos="flip-right">
                                <a href="{{ route('shop', $shop->id) }}"><img class="card-img-top" src="{{ asset('img/') }}/{{ $shop->image }}" alt="" data-aos="fade-zoom-in"></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="{{ route('shop', $shop->id) }}">{{ substr($shop->titre, 0, 15) }}</a>
                                    </h4>
                                    <h5>{{ $shop->prix }} CHF</h5>
                                    <p class="card-text">{{ substr(html_entity_decode( strip_tags($shop->description)), 0, 100) }}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                    <a href="{{ route('panier.ajout', $shop->id) }}"><button class="btn btn-primary">Ajouter au panier</button></a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <!-- /.row -->
                {{ $shops->links() }}

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <section>
        @include('pages.inc.newsletter')
    </section>
@stop

