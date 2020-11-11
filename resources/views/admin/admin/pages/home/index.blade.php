@extends('admin.admin.dashboard')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Page d'acceuil</h4>
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
                    <h4 class="card-title">Modifier la page d'acceuil</h4>
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
                            @foreach($home as $homes)
                                <tr>
                                    <td class="txt-oflo">{{ $homes->id }}</td>
                                    <td class="txt-oflo">{{ substr($homes->titre, 0, 10) }}</td>
                                    <td><span class="">{!!  substr($homes->contenu, 0, 30) !!}...</span> </td>
                                    <td class="txt-oflo">{{  date('j M, Y H:i',strtotime($homes->created_at))}}</td>
                                    <td>
                                        <a href="{{ route('admin.dashboard.show', $homes->id) }}"><button class="btn btn-primary" style="float: left">Voir</button></a>
                                        <form action="{{ route('admin.dashboard.destroy', $homes->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit" style="float: right;">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($posts as $post)
                                <tr>
                                    <td class="txt-oflo">{{ $post->id }}</td>
                                    <td class="txt-oflo">{{ substr($post->titre, 0, 10) }}</td>
                                    <td><span class="">{!! substr($post->contenu, 0, 30) !!}...</span> </td>
                                    <td class="txt-oflo">{{ $post->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.dashboard1.show', $post->id) }}"><button class="btn btn-primary" style="float: left">Voir</button></a>
                                        <form action="{{ route('admin.dashboard1.destroy', $post->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit" style="float: right;">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($news as $new)
                                <tr>
                                    <td class="txt-oflo">{{ $new->id }}</td>
                                    <td class="txt-oflo">{{ substr($new->titre, 0, 10) }}</td>
                                    <td><span class="">{!! substr($new->contenu, 0, 30) !!}...</span> </td>
                                    <td class="txt-oflo">{{ date('j M, Y H:i',strtotime($new->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.dashboard2.show', $new->id) }}"><button class="btn btn-primary" style="float: left">Voir</button></a>
                                        <form action="{{ route('admin.dashboard2.destroy', $new->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit" style="float: right;">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
