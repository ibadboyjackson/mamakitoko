@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title mb-3">Créer une événement</h4>
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
                        <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" name="titre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Contenu</label>
                                <textarea name="contenu" cols="3" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="event_date">Date de l'évennement</label>
                                <input type="datetime-local" name="event_date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Ajouter une image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="author">Nom de l'auteur</label>
                                <input type="text" name="author" class="form-control">
                            </div>
                            <button class="btn btn-primary btn-lg" type="submit">Créer</button>
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
