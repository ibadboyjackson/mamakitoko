@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Liste des Partenaires</h4>
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
                        <h4 class="card-title">Administrer les Partenaires</h4>
                        <a href="{{ route('admin.partenaires.create') }}"><button class="btn btn-primary btn-lg my-3" style="float: left">Ajouter un partenaires</button></a>
                    </div>
                    @include('admin.admin.messages')
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Nom</th>
                                <th class="border-top-0">Image</th>
                                <th class="border-top-0">DATE DE CREATION</th>
                                <th class="border-top-0">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medias as $media)
                                <tr>
                                    <td class="txt-oflo">{{ $media->id }}</td>
                                    <td class="txt-oflo">{{ substr($media->name, 0, 10) }}</td>
                                    <td><img height="30" src="{{ asset('img/logos') }}/{{ $media->image }}" alt=""></td>
                                    <td class="txt-oflo">{{ date('j M, Y H:i',strtotime($media->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.partenaires.show', $media->id) }}"><button class="btn btn-primary" style="float: left">Afficher</button></a>
                                        <form action="{{ route('admin.partenaires.destroy', $media->id) }}" method="post">
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
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->

    </div>

@stop
