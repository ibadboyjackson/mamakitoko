@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Liste des Articles A la Une</h4>
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
                        <h4 class="card-title">Administrer les articles de vente à la une</h4>
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
                            @foreach($shops as $shop)
                                <tr>
                                    <td class="txt-oflo">{{ $shop->id }}</td>
                                    <td class="txt-oflo">{{ substr($shop->titre, 0, 10) }}...</td>
                                    <td><span class="">{!!  substr($shop->description, 0, 20) !!}...</span> </td>
                                    <td class="txt-oflo">{{ date('j M, Y H:i',strtotime($shop->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.top.show', $shop->id) }}"><button class="btn btn-primary" style="float: left">Afficher</button></a>
                                        <form action="{{ route('admin.top.destroy', $shop->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" style="float: right;" type="submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $shops->links() }}
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
