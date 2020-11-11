@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Liste des membres</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Administrer les membres</h4>
                        <a href="{{ route('admin.membre.create') }}"><button class="btn btn-primary btn-lg my-3" style="float: left">Ajouter un Membre</button></a>
                        <a href="{{ route('admin.categories.index') }}"><button class="btn btn-primary btn-lg my-3" style="float: right">administrer les catégories</button></a>
                    </div>
                    @include('admin.admin.messages')
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="border-top-0">Nom</th>
                                <th class="border-top-0">Catégorie</th>
                                <th class="border-top-0">Fonction</th>
                                <th class="border-top-0">Description</th>
                                <th class="border-top-0">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medias as $media)
                                <tr>
                                    <td class="txt-oflo">{{ $media->nom }}</td>
                                    <td class="txt-oflo">{{ $media->category->name }}</td>
                                    <td class="txt-oflo">{{ substr($media->fonction, 0, 10) }}</td>
                                    <td class="txt-oflo">{{ substr(html_entity_decode( strip_tags($media->description)), 0, 10) }}</td>
                                    <td>
                                        <a href="{{ route('admin.membre.show', $media->id) }}"><button class="btn btn-primary" style="float: left">Afficher</button></a>
                                        <form action="{{ route('admin.membre.destroy', $media->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" style="float: right;" type="submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $medias->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
