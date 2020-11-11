@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title mb-3">Editer ce membre</h4>
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
                        <form action="{{ route('admin.membre.update', $media->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" value="{{ $media->nom }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" value="{{ $media->prenom }}" name="prenom" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="" cols="30" rows="10">{{ $media->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="{{ $media->category->id }}">{{ $media->category->name }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fonction">Fonction</label>
                                <input type="text" value="{{ $media->fonction }}" name="fonction" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="facebook">Lien Facebook</label>
                                <input type="text" value="{{ $media->facebook }}" name="facebook" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="instagram">Lien Instagram</label>
                                <input type="text" value="{{ $media->instagram }}" name="instagram" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Lien Twitter</label>
                                <input type="text" value="{{ $media->twitter }}" name="twitter" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Photo de profile</label>
                                <input type="file" name="image" value="{{ $media->image }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image_1">Photo de couverture</label>
                                <input type="file" name="image_1" value="{{ $media->image_1 }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image_2">Photo</label>
                                <input type="file" name="image_2" value="{{ $media->image_2 }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image_3">Photo</label>
                                <input type="file" name="image_3" value="{{ $media->image_3 }}" class="form-control">
                            </div>
                            <button class="btn btn-primary btn-lg" type="submit">Modifier</button>
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
