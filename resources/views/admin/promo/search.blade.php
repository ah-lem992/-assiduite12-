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
                  <h4 class="card-title ">Les promos
                               <a href="{{ url('promo/create') }}" class="btn btn-success"> nouvelle année</a>
                    </h4>
                 </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table  id= "dataTable" class="table">
                      <thead class=" text-primary">
                   <tr>
                       <th>id </th>
                       <th>Annee </th>
                       <th>Editer</th>
                       <th>supprimer</th>
                   </tr>
                <body>
                    @foreach($promos as $promo)
                <tr>
                            <td>{{$promo ->id}} <br></td>
                            <td>{{$promo ->annee}}<br></td>

                            <td>
                             <a href="{{ url('promo/'.$promo->id) }}" class="btn btn-primary">editer </a>

                            <!--  <a href="{{ url('promo/create') }}" class="btn btn-success"> nouvelle année</a>-->
                            <td>
                                <form action="{{ url('promo/'.$promo->id ) }} " method="post ">
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
