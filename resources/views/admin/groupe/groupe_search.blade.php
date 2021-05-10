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
                  <h4 class="card-title ">Les Groupes
                    </h4>
<a href="{{ url('groupe/create') }}" class="btn btn-success"> nouveau groupe</a>
                 </div>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table  id= "dataTable" class="table">
                      <thead class=" text-primary">
                   <tr>
                       <th>groupe id </th>
                       <th>groupe </th>
                       <th>Editer</th>
                       <th>supprimer</th>
                   </tr>
                <body>
                    @foreach($groupes as $groupe)
                <tr>
                            <td>{{$groupe ->groupe_id}} <br></td>
                            <td>{{$groupe ->groupe}}<br></td>

                            <td>
                             <a href="{{ url('groupe/'.$groupe->groupe_id) }}" class="btn btn-primary">editer </a>

                            <!--  <a href="{{ url('groupe/create') }}" class="btn btn-success"> nouvelle année</a>-->
                            <td>
                                <form action="{{ url('groupe/'.$groupe->groupe_id ) }} " method="post ">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                               <button type="submit" class="btn btn-danger">Supprimer</button>

                                </form>
                            </td>

                 </tr>

                    @endforeach

                </body>
            </table>
            <div class="float-right">
            <a href="{{ url('groupe') }}" class="btn btn-primary">retour</a>
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
