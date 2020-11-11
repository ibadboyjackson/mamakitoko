@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title mb-3">Editer cette description</h4>
                @include('admin.admin.messages')
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
                        <form action="{{ route('admin.apropos.update', $media->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="date">Période</label>
                                <input type="text" name="date" value="{{ $media->date }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" name="titre" value="{{ $media->titre }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Contenu</label>
                                <textarea name="contenu" cols="5" rows="10" class="form-control">{{ $media->contenu }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Ajouter une image</label>
                                <input type="file" name="image" class="form-control" value="{{ $media->image }}">
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom de la page</label>
                                <input type="text" value="{{ $media->nom }}" name="nom" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" value="{{ $media->description }}" name="description" class="form-control">
                            </div>
                            <button class="btn btn-primary btn-lg" type="submit">Editer</button>
                        </form>
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
