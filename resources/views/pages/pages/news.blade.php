@extends('pages.template')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
@stop
@section('title')
    Média et News | Mama Kitoko
@stop
@section('content')
<!-- Masthead -->
@include('admin.admin.messages')
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto" data-aos="fade-up">
                <h1 class="mb-5">#This Is The News And Media For Test!</h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            </div>
        </div>
    </div>
</header>

<!-- Image Showcases -->
<section class="showcase py-5">
    <div class="container-fluid p-0">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-6">
                    <h1>Evenements à venir</h1>
                    <p class="lead" style="font-size: 15px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at autem beatae dolor error exercitationem in laborum maiores minima.</p>
                </div>
            </div>


            <div class="row image-banner">
                @foreach($medias as $media)
                <div class="col-md-6"  data-aos="fade-up">
                    <div class="py-1 h-100 text-center">
                        <a href=""><img src="{{ asset("img/$media->image") }}" alt="" width="579.98" height="554" class="img-fluid"></a>
                        <div class="mt-2">{{ date('j M, Y ',strtotime($media->created_at)) }} | Par {{ $media->author }}</div>

                        <div class="text-center mb-5 mt-4">
                            <h3>{{ $media->titre }}</h3>
                            <hr>
                            <p>{!!  $media->contenu !!}</p>
                            <button class="btn btn-primary btn-lg btn-black">En Savoir plus</button>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
        <hr>



    </div>
</section>
<section>
    @include('pages.inc.newsletter')
</section>
@stop
