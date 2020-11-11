@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title mb-3">Editer la Page d'acceuil</h4>
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
                        <form action="{{ route('admin.dashboard2.update', $home->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" name="titre" value="{{ $home->titre }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="contenu">Contenu</label>
                                <textarea name="contenu" cols="3" rows="3" class="form-control">{{ $home->contenu }}</textarea>
                            </div>
                            <button class="btn btn-primary btn-lg" type="submit">Enregistrer</button>
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
