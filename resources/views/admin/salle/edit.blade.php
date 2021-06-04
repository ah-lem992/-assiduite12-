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
                  <h4 class="card-title ">Les salles</h4>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                <body>

                    <form  action="{{url('salle/'.$salle->salle_id)}}" method="post"  >

                        {{ csrf_field() }}
                       <input type="hidden" name="_method" value="PUT">
                        <br/>
                        <div class="form-group">
                            <label for="">Num° </label>
                            <input type="text" name="num" class="form-control" value="{{$salle-> num}}" value="{{ old('num') }}">
                            @if($errors->get('num'))
                            @foreach ($errors ->get('num') as $message )
                                <li> {{$message}}</li>
                            @endforeach
                            @endif

                        </div>
                        <br/>

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
