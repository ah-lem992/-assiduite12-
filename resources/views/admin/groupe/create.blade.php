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
                  <h4 class="card-title ">Ajouter un nouveau groupe

            <form  action="{{url('/groupe')}}" method="post" >
                @csrf

                <div class="form-group">
                    <label >groupe :</label>
                    <input type="text" name="groupe" class="form-control">


                </div>
                   <br/>
                   <div class="form-group">

                    <input type="submit"  class="form-control btn btn-primary" value="Enregistrer ">
                </div>
            </form>
        </div>
    </div>
</div>


</div>
</div>
</div>


@endsection
