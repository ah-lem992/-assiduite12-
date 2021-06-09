@extends('layouts.master')
@section('title')
            dashboard attendance
@endsection

@section('content')
<div class="container-fluid">

       <!--deleting Modal -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <h4 class="card-title ">Les étudiants
                               <a href="{{ url('etudiant/create') }}" class="btn btn-success"> nouveau</a>
                    </h4>

                      <!-- Search form -->

                 </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table  id= "dataTable" class="table">
                      <thead class=" text-primary">
                   <tr>
                       <th>id </th>
                       <td>groupe id</td>
                       <th>nom </th>
                       <th>identifiant</th>
                       <th>sexe </th>
                       <th>naissance</th>
                       <th>phone</th>
                       <th>email</th>
                       <th>adresse</th>

                       <th>action</th>
                   </tr>
                <body>
                    @foreach ($etudiants as $etudiant )



                <tr>
                            <td>{{$etudiant ->etud_id}}</td>
                            <td>{{$etudiant ->groupe_id}}</td>
                            <td>{{$etudiant ->nom}}</td>
                            <td>{{$etudiant ->prenom}}</td>
                            <td>{{$etudiant ->sexe}}</td>
                            <td>{{$etudiant ->naissance}}</td>
                            <td>{{$etudiant ->phone}}</td>
                            <td>{{$etudiant ->email}}</td>
                            <td>{{$etudiant ->adresse}}</td>



                            <td>
                                <a href="{{ url('etudiant/'.$etudiant->etud_id) }}" class="btn btn-primary">mod </a>
                                <a href="javascript::void(0)" class="btn btn-danger deletebtn">supp</a>
                            </td>

                            <!--  <a href="" class="btn btn-success"> nouvelle année</a>-->
                            <td>


                                 </form>
                            </td>
                 </tr>
                 @endforeach



                </body>
            </table>



        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    $(document).ready( function () {
  //  $('#dataTable').DataTable();


    $('#dataTable').on('click','.deletebtn',function(){
        $tr =$(this).closest('tr');
        var data =$tr.children("td").map(function(){
            return $(this).text();

        }).get();
        //console$()
        $('#id_delete').val(data[0]);
        $('#delete-model_form').attr('action','/etudiant-delete/'+data[0]);
        $('#deletemodalpop').modal('show');




    });
    } );
    </script>
@endsection

