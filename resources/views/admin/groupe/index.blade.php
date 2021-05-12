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
</div>
  <!--end modal  -->
    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title  ">Les Groupes

                    </h4>
                    <a href="{{ url('groupe/create') }}" class="btn btn-success"> nouveau groupe</a>
                    <div class="float-right">
                       <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" type="get" action="{{url('/search_groupe')}}" method="GET">
            {{ csrf_field() }}
           <div class="form-group mb-0">
             <div class="input-group input-group-alternative input-group-merge">
               <div class="input-group-prepend">
                 <span class="input-group-text"><i class="fas fa-search"></i></span>
               </div>
               <input class="form-control" name="search" placeholder="tapez groupe num° " type="text">
             </div>
           </div>
           <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
             <span aria-hidden="true">×</span>
           </button>
         </form>
                    </div>
                 </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table  id= "dataTable" class="table">
                      <thead class=" text-primary">
                   <tr>
                       <th>id </th>
                       <th>groupe </th>
                       <th>promo </th>
                       <th>Editer</th>
                       <th>supprimer</th>
                   </tr>
                <body>

                    @foreach($groupes as $groupe )

                <tr>

                    <td> {{$groupe -> groupe_id}}</td>
                    <td>{{$groupe -> groupe}}</td>
                    <td>{{$groupe->promo->annee}}</td>
                            <td>
                             <a href="{{ url('groupe/'.$groupe->groupe_id) }}" class="btn btn-primary">editer </a>
                            </td>
                            <!--  <a href="{{ url('') }}" class="btn btn-success"> nouvelle année</a>-->
                            <td>

                                <form action="{{ url('groupe-delete/'.$groupe->groupe_id ) }} " method="post ">
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
