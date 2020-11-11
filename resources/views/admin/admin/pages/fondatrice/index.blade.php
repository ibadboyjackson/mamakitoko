@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Vos informations</h4>
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
                        <h4 class="card-title">Administrer vos informations</h4>
                    </div>
                    @include('admin.admin.messages')
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="border-top-0">A propos</th>
                                <th class="border-top-0">Expérience</th>
                                <th class="border-top-0">Education</th>
                                <th class="border-top-0">Compétences</th>
                                <th class="border-top-0">Interet</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $new)
                                <tr>
                                    <td class="txt-oflo">{{ $new->nom }}</td>
                                    <td class="txt-oflo">{!! substr($new->experience, 0, 10) !!}</td>
                                    <td><span class="">{!! substr($new->education, 0, 20) !!}</span> </td>
                                    <td class="txt-oflo">{!! substr($new->competences, 0, 20) !!}</td>
                                    <td class="txt-oflo">{!!substr($new->interet, 0, 20) !!}</td>
                                    <td>
                                        <a href="{{ route('admin.fondatrice.show', $new->id) }}"><button class="btn btn-primary" >Voir</button></a>
                                        <a href="{{ route('admin.fondatrice.edit', $new->id) }}"><button class="btn btn-primary" >Modifier</button></a>
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
