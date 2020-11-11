@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/encore') }}/{{ $media->image }}" alt="" class="img-fluid my-5">
                        <img src="{{ asset('img/encore') }}/{{ $media->image_1 }}" alt="" class="img-fluid my-5">
                        <img src="{{ asset('img/encore') }}/{{ $media->image_2 }}" alt="" class="img-fluid my-5">
                        <img src="{{ asset('img/encore') }}/{{ $media->image_3 }}" alt="" class="img-fluid my-5">
                        <h4 class="card-title">{{ $media->nom }}</h4>
                        <h5 class="my-3">{{ $media->prenom }}</h5>
                        <h5 class="my-3">{{ $media->category->name }}</h5>
                        <h5 class="my-3">{{ $media->fonction }}</h5>
                        <p class="my-3">{!! $media->description !!}</p>
                        <h5 class="my-3">{{ $media->facebook }}</h5>
                        <h5 class="my-3">{{ $media->instagram }}</h5>
                        <h5 class="my-3">{{ $media->twitter }}</h5>
                        <a href="{{ route('admin.membre.edit', $media->id) }}"><button class="btn btn-primary btn-lg">Modifier ce membre</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->

    </div>

@stop
