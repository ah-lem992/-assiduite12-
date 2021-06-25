@extends('layouts.prof_theme')
@section('title')
    prof attendance
@endsection

@section('content')
    <div class="card">

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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-danger">oui , je confirme</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">la présence
                        <a href="{{ url('/profs/presences/create') }}" class="btn btn-success"> Ajouter</a>
                    </h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>id </th>
                                        <th>promo</th>
                                        <th>spécialité</th>
                                        <th>groupe</th>
                                        <th>seance</th>
                                        <th>heure entré</th>
                                        <th>heure sortie</th>
                                        <th>etudiant</th>

                                        <th>editer /supprimer</th>
                                    </tr>

                                    <tbody>
                                        @foreach ($presences as $presence)
                                            <tr>
                                                <td>{{ $presence->presence_id }}</td>
                                                <td>{{$presence->promo_id}}</td>
                                                <td>{{$presence->specialite_id}}</td>
                                                <th>{{$presence->groupe_id}}</th>
                                                <td>{{ $presence->seances->day}}</td>
                                                <td>{{ $presence->seances->start_time }}</td>
                                                <td>{{ $presence->seances->end_time }}</td>
                                                <td>{{ $presence->etudiants->nom }}</td>
                                                <!--  <a href="" class="btn btn-success"> nouvelle année</a>-->
                                                <td>
                                                    <a href="{{ url('/profs/presences/' . $presence->presence_id) }}"
                                                        class="btn btn-primary">editer</a>
                                                    <button type="submit" class="btn btn-danger deletebtn">Supprimer</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                            </table>



                        </div>
                    </div>
                </div>



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
                            $('#delete-model_form').attr('action', '/profs/presences-delete/' + data[0]);
                            $('#deletemodalpop').modal('show');




                        });
                    });

                </script>
            @endsection
