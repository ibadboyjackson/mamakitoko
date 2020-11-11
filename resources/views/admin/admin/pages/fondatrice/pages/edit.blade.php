@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title mb-3">Editer Vos Informations</h4>
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
                        <form action="{{ route('admin.fondatrice.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" value="{{ $news->nom }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="titre">Prenom</label>
                                <input type="text" name="prenom" value="{{ $news->prenom }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" name="adresse" value="{{ $news->adresse }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ $news->email }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="telephone">Numéro de téléphone</label>
                                <input type="text" name="telephone" value="{{ $news->telephone }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" cols="5" rows="10" class="form-control">{{ $news->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="experience">Votre expérience</label>
                                <textarea name="experience" cols="5" rows="10" class="form-control">{{ $news->experience }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="education">Education</label>
                                <textarea name="education" cols="5" rows="10" class="form-control">{{ $news->education }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="competences">Vos compétences</label>
                                <textarea name="competences" cols="5" rows="10" class="form-control">{{ $news->competences }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="interet">Vos intérets</label>
                                <textarea name="interet" cols="5" rows="10" class="form-control">{{ $news->interet }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Ajouter votre photo</label>
                                <input type="file" name="image" class="form-control">
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
