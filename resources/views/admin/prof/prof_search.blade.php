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
                  <h4 class="card-title ">Les proffesueur
                    </h4>
<a href="{{ url('prof/create') }}" class="btn btn-success"> nouveau prof</a>
                 </div>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table  id= "dataTable" class="table">
                      <thead class=" text-primary">
                   <tr>
                       <th>prof id </th>
                       <th>nom </th>
                       <th>grade </th>
                       <th>Editer</th>
                       <th>supprimer</th>
                   </tr>
                <body>
                    @foreach($profs as $prof)
                <tr>
                            <td>{{$prof ->prof_id}} <br></td>
                            <td>{{$prof ->nom}}<br></td>
                            <td>{{$prof ->grade}}<br></td>

                            <td>
                             <a href="{{ url('prof/'.$prof->prof_id) }}" class="btn btn-primary">editer </a>

                            <!--  <a href="{{ url('prof/create') }}" class="btn btn-success"> nouvelle année</a>-->
                            <td>
                                <form action="{{ url('prof/'.$prof->prof_id ) }} " method="post ">
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
            <a href="{{ url('prof') }}" class="btn btn-primary">retour</a>
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
