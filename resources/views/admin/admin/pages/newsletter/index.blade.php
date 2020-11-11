@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Liste des membres</h4>
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
                        <h4 class="card-title">Administrer les newsletters</h4>
                        <h5 class="my-3">Utilisateurs incrits : <strong>({{ $users->count() }})</strong></h5>
                        <a href="{{ route('admin.newsletter.create') }}"><button class="btn btn-primary btn-lg my-3" style="float: left">Ecrire une newsletter</button></a>
                    </div>
                    @include('admin.admin.messages')
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Nom</th>
                                <th class="border-top-0">Emails</th>
                                <th class="border-top-0">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $new)
                                <tr>
                                    <td class="txt-oflo">{{ $new->id }}</td>
                                    <td class="txt-oflo">{{ $new->name }}</td>
                                    <td class="txt-oflo">{{ $new->email }}</td>
                                    <td>
                                        <form action="{{ route('admin.newsletter.destroy', $new->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $news->links() }}
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
