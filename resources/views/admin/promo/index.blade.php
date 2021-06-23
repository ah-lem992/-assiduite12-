@extends('layouts.master')
@section('title')
    dashboard attendance
@endsection

@section('content')
    <div class="container-fluid">
        <!--deleting Modal -->
        <div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="" id="delete-model_form" method="post ">

                        {{ csrf_field() }}


                        <div class="modal-body">
                            <input type="hidden" id="id_delete">
                            <h4> vous etes sur de cette suppresion</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuuler</button>
                            <button type="submit" class="btn btn-danger">oui , je confirme</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end modal  -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <h4 class="card-title ">Les promos
                        <a href="{{ url('promo/create') }}" class="btn btn-success"> nouvelle année</a>
                    </h4>
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" type="get"
                        action="{{ url('/promo_search
                    ') }}" method="GET">
                        {{ csrf_field() }}
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" name="search" placeholder="chercher " type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>id </th>
                                <th>Annee </th>
                                <th>Voir les groupe</th>

                                <th>Editer</th>
                                <th>supprimer</th>
                            </tr>

                            <body>
                                @foreach ($promos as $promo)
                                    <tr>
                                        <td>{{ $promo->id }} <br></td>
                                        <td>{{ $promo->annee }}<br></td>
                                        <td><a href="{{url('promo-show',$promo->id)}}" type="button" class="btn btn-light">Voir les groupes </a></td>

                                        <td>
                                            <a href="{{ url('promo/' . $promo->id) }}" class="btn btn-primary">editer </a>
                                        </td>
                                        <!--  <a href="{{ url('promo/create') }}" class="btn btn-success"> nouvelle année</a>-->
                                        <td>

                                            <button type="submit" class="btn btn-danger deletebtn">Supprimer</button>

                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                            </body>
                    </table>



                </div>
            </div>
        </div>


        {{ $promos->links() }}

    @endsection
    @section('scripts')
        <script>
            $(document).ready(function() {
                //  $('#dataTable').DataTable();


                $('#dataTable').on('click', '.deletebtn', function() {
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();

                    }).get();
                    //console$()
                    $('#id_delete').val(data[0]);
                    $('#delete-model_form').attr('action', '/promo-delete/' + data[0]);
                    $('#deletemodalpop').modal('show');




                });
            });

        </script>
    @endsection
