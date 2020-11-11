@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title mb-3">Ajouter un partenaire</h4>
                @include('admin.admin.messages')
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.partenaires.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom du partenaire</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Ajouter une image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <button class="btn btn-primary btn-lg" type="submit">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
