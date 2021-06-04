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
                  <h4 class="card-title ">Asoocier prof a un cour </h4>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                <body>

                    <form  action="/prof-save" method="POST"  >

                        @csrf

                        <br/>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" >selectionez prof</label>
                            <select class="form-control" name="prof_id" id="exampleFormControlSelect1">
                                @foreach ( $profs as $prof )

                                <option value="{{$prof->prof_id}}">{{$prof->nom}}</option>
                                   @endforeach

                            </select>
                          </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1" >selectionez cour</label>
                                <select class="form-control" name="cour_id" id="exampleFormControlSelect1">
                                    @foreach ( $cours as $cour )

                                    <option value="{{$cour->cour_id}}">{{$cour->nom}}</option>
                                       @endforeach

                                </select>
                            </select>
                          </div>
                        <br/>

                           <div class="form-group">

                            <input type="submit"  class="form-control btn btn-primary" value="ajouter  ">
                        </div>
                    </form>

                </body>
            </table>

                  </div>

        </div>
    </div>
</div>
            </div>
    </div>
</div>



@endsection
@section('scripts')
@endsection
