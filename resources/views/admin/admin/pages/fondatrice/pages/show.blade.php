@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Modifier Vos Informations</h4>
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
                        <img src="{{ asset('img/team') }}/{{ $news->image }}" alt="" class="img-fluid my-5" width="200" height="200">
                        <h4 class="card-title">{{ $news->nom }}</h4>
                        <h5 class="my-3"><strong>{{ $news->prenom }}</strong></h5>
                        <p>{{ $news->adresse }}</p>
                        <p>{{ $news->email }}</p>
                        <p>{{ $news->telephone }}</p>
                        <p>{!! $news->description !!}</p>
                        <p>{!! $news->experience !!}</p>
                        <p>{!! $news->education !!}</p>
                        <p>{!! $news->competences !!}</p>
                        <p>{!! $news->interet !!}</p>
                        <a href="{{ route('admin.fondatrice.edit', $news->id) }}"><button class="btn btn-primary btn-lg">Editer</button></a>
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
