@extends('layouts.prof_theme')

@section('title')
    profs attendance
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title "></h4>
                        <form action="{{ url('/profs/presences') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">selectionez groupe </label>
                                <select class="form-control" name="groupe_id" id="exampleFormControlSelect1">
                                    @foreach ($groupes as $groupe)

                                        <option value="{{ $groupe->groupe_id }}">{{ $groupe->groupe }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->get('groupe_id'))
                                    @foreach ($errors->get('groupe_id') as $message)
                                        <li> {{ $message }}</li>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">selectionez seance </label>
                                <select class="form-control" name="id" id="exampleFormControlSelect1">
                                    @foreach ($seances as $seance)

                                        <option value="{{ $seance->id }}">{{ $seance->day }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->get('id'))
                                    @foreach ($errors->get('id') as $message)
                                        <li> {{ $message }}</li>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">selectionez date </label>
                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="date"
                                    id="exampleFormControlSelect1">
                                @if ($errors->get('date'))
                                    @foreach ($errors->get('date') as $message)
                                        <li> {{ $message }}</li>
                                    @endforeach
                                @endif
                            </div>

                            @foreach ($etudiants as $etudiant)
                                <div class="form-check form-check">
                                    <input type="checkbox" value="{{ $etudiant->etud_id }}" name="etudiants_ids[]" />
                                    <label class="form-check-label" for="inlineCheckbox1">{{ $etudiant->nom }}</label>
                                </div>
                            @endforeach



                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" value="Enregistrer ">
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
