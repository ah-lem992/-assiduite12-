@extends('layouts.prof_theme')
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

<form action="{{url('/profs/presences/')}}" method="post">
    @csrf

      <div class="form-group">
        <label for="exampleFormControlSelect1" >selectionez la seance</label>
        <select class="form-control" name="id" id="exampleFormControlSelect1 " value="{{ old('salle_id') }}">
            @foreach ( $seances as $seance )

          <option value="{{$seance->id}}">{{$seance->id}}</option>
             @endforeach
        </select>
        @if($errors->get('id'))
        @foreach ($errors ->get('id') as $message )
            <li> {{$message}}</li>
        @endforeach
        @endif
      </div>

    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1" >selectionnez etudiants</label>
        <select class="form-control" name="etudiants_ids[]" id="exampleFormControlSelect1" multiple>
                @foreach ( $etudiants as $etudiant )
                <option value="{{$etudiant->etud_id}}">{{$etudiant->nom}}</option>
                   @endforeach

            </select>
            @if($errors->get('etudiants_ids[]'))
            @foreach ($errors ->get('etudiants_ids[]') as $message )
                <li> {{$message}}</li>
            @endforeach
            @endif
      </div>


    </div>
            </div>
    </div>
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
