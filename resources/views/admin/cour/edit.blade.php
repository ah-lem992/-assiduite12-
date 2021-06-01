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
                  <h4 class="card-title ">Les cours</h4>

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
                            <input type="text" name="cour" class="form-control" id="exampleFormControlInput1" value="{{$cour-> cour}}" value="{{ old('cour') }}" {{Request::old('cour')}}>
                          </div>

                        <br/>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" >selectionez promo</label>

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
