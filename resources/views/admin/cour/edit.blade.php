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
                  <h4 class="card-title ">Les profs</h4>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                <body>

                    <form  action="{{url('cour/'.$cour->cour_id)}}" method="post"  >

                        {{ csrf_field() }}
                       <input type="hidden" name="_method" value="PUT">
                        <br/>
                        <div class="form-group">
                            <label for="">cour</label>
                            <input type="text" name="nom" class="form-control" id="exampleFormControlInput1" value="{{$cour-> nom}}" value="{{ old('nom') }}" {{Request::old('nom')}}>
                            @if($errors->get('nom'))
                            @foreach ($errors ->get('nom') as $message )
                                <li> {{$message}}</li>
                            @endforeach
                    @endif
                        </div>

                        <br/>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" >selectionez prof</label>
                            <select class="form-control" name="profses_ids[]" id="exampleFormControlSelect1" multiple>
                                    @foreach ($profs as $prof)
                                    <option value="{{$prof->prof_id}}">{{$prof->nom}}</option>
                                       @endforeach

                                </select>
                                @if($errors->get('profses_ids[]'))
                                @foreach ($errors ->get('profses_ids[]') as $message )
                                    <li> {{$message}}</li>
                                @endforeach
                                @endif
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
