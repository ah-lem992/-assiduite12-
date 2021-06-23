@extends('layouts.master')
@section('title')
            dashboard attendance
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Les specialités
                    </h4>
<a href="{{ url('specialite/create') }}" class="btn btn-success"> nvl spécialité</a>
                 </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table  id= "dataTable" class="table">
                        <thead class=" text-primary">
                     <tr>
                         <th>id </th>
                         <th>promo </th>
                         <th>specialité </th>
                         <th>Editer</th>
                         <th>supprimer</th>
                     </tr>
                  <body>

                      @foreach($specialites as $specialite )

                  <tr>

                      <td> {{$specialite ->specialite_id}}</td>
                      <td>{{$specialite ->promo_id}}</td>
                      <td>{{$specialite ->specialite}}</td>


                              <td>
                               <a href="{{ url('specialite/'.$specialite->specialite_id) }}" class="btn btn-primary">editer </a>
                              </td>
                              <!--  <a href="{{ url('') }}" class="btn btn-success"> nouvelle année</a>-->
                              <td>

                                  <a href="javascript::void(0)" class="btn btn-danger deletebtn">supprimer </a>



                              </td>
                   </tr>
                   @endforeach


                  </body>

            </table>
            <div class="float-right">
            <a href="{{ url('specialite') }}" class="btn btn-primary">retour</a>
          </div>


        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
        } );
</script>
@endsection
