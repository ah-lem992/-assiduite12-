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
                  <h4 class="card-title ">Ajouter un nouveau cour

<form action="{{url('/cour')}}" method="POST">
    @csrf

    <div class="form-group">
      <label for="exampleFormControlInput1">cour</label>
      <input type="text" name="nom" class="form-control" id="exampleFormControlInput1" placeholder="taper le cour">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1" >selectionez le proffeseur</label>
      <select class="form-control" name="prof_id" id="exampleFormControlSelect1">

      </select>
    </div>
    <div class="form-group">
    <input type="submit"  class="form-control btn btn-primary" value="Enregistrer ">
    </div>


  </form>
</div>
</div>


</div>
</div>
</div>
@endsection
