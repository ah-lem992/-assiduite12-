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
                  <h4 class="card-title ">

<form action="{{url('/seance')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlSelect1" >selectionez cour</label>
      <select class="form-control" name="cour_id" id="exampleFormControlSelect1">
          @foreach ( $cours as $cour )

        <option value="{{$cour->cour_id}}">{{$cour->nom}}</option>
           @endforeach
      </select>
      @if($errors->get('cour_id'))
      @foreach ($errors ->get('cour_id') as $message )
          <li> {{$message}}</li>
      @endforeach
      @endif
    </div>


    <div class="form-group">
    <div class="form-check" >
        <label for="exampleFormControlSelect1" >Type de module :</label><br/>
        <input class="form-check-input"  value="Cour" type="radio" name="type" id="flexRadioDefault1" value="{{ old('type') }}">

        <label class="form-check-label" for="flexRadioDefault1">
          cour
        </label>
      </div>
      <div class="form-check" >
        <input class="form-check-input" value="td" type="radio" name="type" id="flexRadioDefault1" value="{{ old('type') }}">

        <label class="form-check-label" for="flexRadioDefault1">
          Td
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" value="tp" type="radio" name="type" id="flexRadioDefault2"value="{{ old('type') }}" >

        <label class="form-check-label" for="flexRadioDefault2">
          Tp
        </label>
      </div>
      @if($errors->get('type'))
      @foreach ($errors ->get('type') as $message )
          <li> {{$message}}</li>
      @endforeach
      @endif
    </div>



    <div class="form-group">
        <label for="exampleFormControlSelect1" >selectionez prof</label>
        <select class="form-control" name="prof_id" id="exampleFormControlSelect1" value="{{ old('prof_id') }}">
            @foreach ( $profs as $prof )

          <option value="{{$prof->prof_id}}">{{$prof->nom}}</option>
             @endforeach
        </select>

      </div>








      <div class="form-group">
        <label for="exampleFormControlSelect1" >selectionez salle</label>
        <select class="form-control" name="salle_id" id="exampleFormControlSelect1 " value="{{ old('salle_id') }}">
            @foreach ( $salles as $salle )

          <option value="{{$salle->salle_id}}">{{$salle->num}}</option>
             @endforeach
        </select>
        @if($errors->get('salle_id'))
        @foreach ($errors ->get('salle_id') as $message )
            <li> {{$message}}</li>
        @endforeach
        @endif
      </div>
      <div class="form-group">
        <label for="" >selectionez le jour</label>
        <select class="form-control" name="day" id="jour" >
            <option value="Dimanche" >Dimanche</option>
            <option value="Lundi">Lundi</option>
            <option value="Mardi">Mardi</option>
            <option value="Merecredi">Merecredi</option>
            <option value="Jeudi">Jeudi</option>
            <option value="Vendredi">Vendredi</option>

      </select>
      @if($errors->get('day'))
      @foreach ($errors ->get('day') as $message )
          <li> {{$message}}</li>
      @endforeach
      @endif

    </div>
    <div class="form-group">
        <label for="" >selectionez l'heure d'entré</label>
        <input class="form-control" type="time"
    value="{{ old('start_time') }}" name="start_time">
        @if($errors->get('start_time'))
        @foreach ($errors ->get('start_time') as $message )
            <li> {{$message}}</li>
        @endforeach
        @endif
    </div>
    <div class="form-group">
        <label for="" >selectionez l'heure de sortie </label>
        <input class="form-control" type="time" value="{{ old('end_time') }}" name="end_time">
        @if($errors->get('end_time'))
        @foreach ($errors ->get('end_time') as $message )
            <li> {{$message}}</li>
        @endforeach
        @endif
    </div>

        <div class="form-group">
            <input type="submit"  class="form-control btn btn-primary" value="Enregistrer ">
            </div>
</form>
        </div>
        </div>

@endsection
@section('scripts')

@endsection