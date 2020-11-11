@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title mb-3">Ajouter un membre d'équipe</h4>
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
                        <form action="{{ route('admin.membre.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prenom</label>
                                <input type="text" name="prenom" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="fonction">Fonction</label>
                                <input type="text" name="fonction" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="facebook">Lien Facebook</label>
                                <input type="text" name="facebook" class="form-control" placeholder="exemple: https://www.facebook.com/mamakitoko" >
                            </div>
                            <div class="form-group">
                                <label for="instagram">Lien Instagram</label>
                                <input type="text" placeholder="exemple: https://www.instagram.com/mamakitoko"  name="instagram" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Lien Twitter</label>
                                <input type="text" name="twitter" placeholder="exemple: https://www.twitter.com/mamakitoko" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Ajouter une photo de profile</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image_1">Ajouter une photo de couverture</label>
                                <input type="file" name="image_1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image_2">Ajouter une autre photo</label>
                                <input type="file" name="image_2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image_3">Ajouter une autre photo</label>
                                <input type="file" name="image_3" class="form-control">
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
