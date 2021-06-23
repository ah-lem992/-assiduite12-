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
                  <h4 class="card-title ">Ajouter nv

<form action="{{url('/specialite')}}" method="POST">
    @csrf

    <div class="form-group">
      <label for="exampleFormControlInput1">specialite</label>
      <input type="text" name="specialite" class="form-control" id="exampleFormControlInput1" placeholder="taper specialite">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1" >selectionez promo</label>
      <select class="form-control" name="promo_id" id="exampleFormControlSelect1">
          @foreach ( $promos as $promo )

        <option value="{{$promo->id}}">{{$promo->annee}}</option>
           @endforeach
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
