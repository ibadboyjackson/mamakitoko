@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Liste des medias et News</h4>
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
                        <h4 class="card-title">Administrer les Médias et News</h4>
                        <a href="{{ route('admin.media.create') }}"><button class="btn btn-primary btn-lg my-3" style="float: left">Créer un Média</button></a>
                    </div>
                    @include('admin.admin.messages')
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">TITRE</th>
                                <th class="border-top-0">CONTENU</th>
                                <th class="border-top-0">DATE DE CREATION</th>
                                <th class="border-top-0">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medias as $media)
                                <tr>
                                    <td class="txt-oflo">{{ $media->id }}</td>
                                    <td class="txt-oflo">{{ substr($media->titre, 0, 10) }}</td>
                                    <td><span class="">{!! substr($media->contenu, 0, 28) !!}</span> </td>
                                    <td class="txt-oflo">{{ date('j M, Y H:i',strtotime($media->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.media.show', $media->id) }}"><button class="btn btn-primary" style="float: left">Afficher</button></a>
                                        <form action="{{ route('admin.media.destroy', $media->id) }}" method="post">
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
