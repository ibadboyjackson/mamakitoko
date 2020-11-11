@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title mb-3">Ecrire une newsletter aux utilisateurs</h4>
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
                        <form action="{{ route('admin.newsletter.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Titre</label>
                                <input type="text" name="titre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="contenu">Votre message</label>
                                <textarea name="contenu" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Ajouter une photo</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <button class="btn btn-primary btn-lg" type="submit">Envoyer</button>
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
