@extends('layouts.prof_theme')
@section('title')
            prof attendance
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">

<form action="{{url('/presences')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="exampleFormControlSelect1" >selectionez seance </label>
        <select class="form-control" name="id" id="exampleFormControlSelect1">
            @foreach ( $seances as $seance )

          <option value="{{$seance->id}}">{{$seance->day}}</option>
             @endforeach
        </select>
        @if($errors->get('id'))
        @foreach ($errors ->get('id') as $message )
            <li> {{$message}}</li>
        @endforeach
        @endif
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1" >selectionez prof </label>
        <select class="form-control" name="prof_id" id="exampleFormControlSelect1">
            @foreach ( $profs as $prof )

          <option value="{{$prof->prof_id}}">{{$prof->nom}}</option>

             @endforeach
        </select>
        @if($errors->get('prof_id'))
        @foreach ($errors ->get('prof_id') as $message )
            <li> {{$message}}</li>
        @endforeach
        @endif
      </div>



<div class="form-group">
    <label for="exampleFormControlSelect1" >selectionez etudiant</label>
    <select class="form-control" name="etud_id" id="exampleFormControlSelect1">
        @foreach ( $etudiants as $etudiant )

      <option value="{{$etudiant->etud_id}}">{{$etudiant->nom}}</option>
         @endforeach
    </select>
    @if($errors->get('etud_id'))
    @foreach ($errors ->get('etud_id') as $message )
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
