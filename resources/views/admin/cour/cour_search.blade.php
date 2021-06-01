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
                  <h4 class="card-title ">Les cours
                    </h4>
<a href="{{ url('cour/create') }}" class="btn btn-success"> nouveau cour</a>
                 </div>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table  id= "dataTable" class="table">
                      <thead class=" text-primary">
                   <tr>
                       <th>cour id </th>
                       <th>cour </th>
                       <th>prof </th>
                       <th>Editer</th>
                       <th>supprimer</th>
                   </tr>
                <body>
                    @foreach($cours as $cour)
                <tr>
                            <td>{{$cour ->cour_id}} <br></td>
                            <td>{{$cour ->nom}}<br></td>
                            <td>prof<br></td>

                            <td>
                             <a href="{{ url('cour/'.$cour->cour_id) }}" class="btn btn-primary">editer </a>

                            <!--  <a href="{{ url('cour/create') }}" class="btn btn-success"> nouvelle année</a>-->
                            <td>
                                <form action="{{ url('cour/'.$cour->cour_id ) }} " method="post ">
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
            <a href="{{ url('cour') }}" class="btn btn-primary">retour</a>
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
