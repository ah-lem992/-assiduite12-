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
                  <h4 class="card-title ">modifie info Prof</h4>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                <body>

                    <form  action="{{url('prof/'.$prof->prof_id)}}" method="post"  >

                        {{ csrf_field() }}
                       <input type="hidden" name="_method" value="PUT">
                        <br/>
                        <div class="form-group">
                            <label for="">Nom </label>
                            <input type="text" name="nom" class="form-control" value="{{$prof-> nom}}" value="{{ old('nom') }}">
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="">Grade </label>
                            <input type="text" name="grade" class="form-control" value="{{$prof-> grade}}" value="{{ old('grade') }}">
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
