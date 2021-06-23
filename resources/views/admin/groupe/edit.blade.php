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
                  <h4 class="card-title ">Les groupes</h4>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                <body>

                    <form  action="{{url('groupe/'.$groupe->groupe_id)}}" method="post"  >

                        {{ csrf_field() }}
                       <input type="hidden" name="_method" value="PUT">
                        <br/>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Groupe</label>
                            <input type="text" name="groupe" class="form-control" id="exampleFormControlInput1" value="{{$groupe-> groupe}}" value="{{ old('groupe') }}" placeholder="taper le groupe">
                          </div>
                      
                        <br/>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" >sélectionnez promo</label>
                            <select class="form-control" name="promo_id" value="{{ old('promo_id') }}" id="exampleFormControlSelect1">
                                @foreach ( $promos as $promo )

                              <option value="{{$promo->id}}">{{$promo->annee}}</option>
                                 @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1" >sélectionnez spécialité</label>
                            <select class="form-control" name="specialite_id" value="{{ old('specialite_id') }}" id="exampleFormControlSelect1">
                                @foreach ( $specialites as $specialite )

                              <option value="{{$specialite->specialite_id}}">{{$specialite->specialite}}</option>
                                 @endforeach
                            </select>
                          </div>


                           <div class="form-group">

                            <input type="submit"  class="form-control btn btn-primary" value="modifier  ">
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
