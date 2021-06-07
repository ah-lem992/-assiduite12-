@extends('layouts.master')
@section('title')
            dashboard attendance
@endsection
@section('content')
<div class="card">
    <div class="card-header">
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
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Emploi du temps
                           <a href="{{ url('seance/create') }}" class="btn btn-success">  Nouveau</a>
                </h4>
    <div class="card-body">
        <div class="table-responsive">
          <table  id= "dataTable" class="table">
            <thead class=" text-primary">
         <tr>
             <th>id </th>
             <th>cour </th>
             <th>type </th>
             <th>prof </th>
             <th>salle </th>
             <th>le jour</th>
             <th>H d'entré</th>
             <th>H d'sortie</th>
             <th>editer /supprimer</th>
         </tr>
      <body>
        @foreach($seances as $seance)
        <tr>
                    <td>{{$seance->id}}</td>
                    <td>
                        {{$seance->cour_id}}</td>
                        <td>{{$seance->type}}</td>
                    <td>{{$seance->prof_id}}</td>
                    <td>{{$seance->salle_id}}</td>
                    <td>{{$seance->day}}</td>
                    <td>{{$seance->start_time}}</td>
                    <td>{{$seance->end_time}}</td>




                    <!--  <a href="" class="btn btn-success"> nouvelle année</a>-->
                    <td>

                        <a href="{{ url('seance/'.$seance->id) }}" class="btn btn-primary">mod</a>
                        <button type="submit" class="btn btn-danger deletebtn">Supp</button>
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
$('#delete-model_form').attr('action','/seance-delete/'+data[0]);
$('#deletemodalpop').modal('show');




});
} );
</script>
@endsection

