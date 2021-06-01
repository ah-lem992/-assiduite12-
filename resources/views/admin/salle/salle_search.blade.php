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
                  <h4 class="card-title ">Les salles
                               <a href="{{ url('salle/create') }}" class="btn btn-success"> nouvelle salle</a>
                    </h4>
                 </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table  id= "dataTable" class="table">
                      <thead class=" text-primary">
                   <tr>
                       <th>id </th>
                       <th>num </th>
                       <th>Editer</th>
                       <th>supprimer</th>
                   </tr>
                <body>
                    @foreach($salles as $salle)
                <tr>
                            <td>{{$salle ->salle_id}} <br></td>
                            <td>{{$salle ->num}}<br></td>

                            <td>
                             <a href="{{ url('salle/'.$salle->salle_id) }}" class="btn btn-primary">editer </a>

                            <!--  <a href="{{ url('salle/create') }}" class="btn btn-success"> nouvelle année</a>-->
                            <td>
                                <form action="{{ url('salle/'.$salle->salle_id ) }} " method="post ">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                               <button type="submit" class="btn btn-danger">Supprimer</button>

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
    $('#dataTable').DataTable();
        } );
</script>
@endsection
