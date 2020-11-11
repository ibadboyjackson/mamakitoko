@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title mb-3">Ajouter une description</h4>
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
                        <form action="{{ route('admin.apropos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="date">Période</label>
                                <input type="text" name="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" name="titre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="contenu">Contenu</label>
                                <textarea name="contenu" cols="3" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Ajouter une image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" cols="3" rows="5" class="form-control"></textarea>
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
