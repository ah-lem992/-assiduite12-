@extends('layouts.master')
@section('title')
            dashboard attendance
@endsection

@section('content')
<div class="container-fluid">
    <!--deleting Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!--end modal  -->
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
                            </td>
                            <!--  <a href="{{ url('promo/create') }}" class="btn btn-success"> nouvelle année</a>-->
                            <td>
                                <form action="{{ url('promo-delete/'.$promo->id ) }} " method="post ">
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


{{$promos->links()}}

@endsection
@section('scripts')
<script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
        } );
</script>
@endsection
