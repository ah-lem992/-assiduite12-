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
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif
              <h4 class="card-title ">la présence
                           <a href="{{ url('presence/create') }}" class="btn btn-success">  Nouveau</a>
                </h4>
    <div class="card-body">
        <div class="table-responsive">
          <table  id= "dataTable" class="table">
            <thead class=" text-primary">
         <tr>
             <th>id </th>
             <th>prof </th>
             <th>seance</th>
             <th>etudiant</th>

             
         </tr>
      <body>
                   @foreach ($presences as $presence )
        <tr>
                    <td>{{$presence->presence_id}}</td>

                    <td> {{$presence->prof_id}} </td>
                    <td>{{$presence->id}}</td>
                    <td>{{$presence->etudiants->nom}}</td>

                    <!--  <a href="" class="btn btn-success"> nouvelle année</a>-->


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
$('#delete-model_form').attr('action','/presence-delete/'+data[0]);
$('#deletemodalpop').modal('show');




});
} );
</script>
@endsection
