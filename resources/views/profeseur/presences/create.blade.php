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
                                <label for="exampleFormControlSelect1">Sélectionnez promo </label>
                                <select class="form-control" name="promo_id" id="exampleFormControlSelect1">
                                    @foreach ($promos as $promo)

                                        <option value="{{ $promo->promo_id }}">{{ $promo->annee }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->get('promo_id'))
                                    @foreach ($errors->get('promo_id') as $message)
                                        <li> {{ $message }}</li>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Sélectionnez spécialité </label>
                                <select class="form-control" name="specialite_id" id="exampleFormControlSelect1">
                                    @foreach ($specialites as $specialite)

                                        <option value="{{ $specialite->specialite_id }}">{{ $specialite->specialite }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->get('specialite_id'))
                                    @foreach ($errors->get('specialite_id') as $message)
                                        <li> {{ $message }}</li>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Sélectionnez groupe </label>
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
                                <label for="exampleFormControlSelect1">Sélectionnez date </label>
                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="date"
                                    id="exampleFormControlSelect1">
                                @if ($errors->get('date'))
                                    @foreach ($errors->get('date') as $message)
                                        <li> {{ $message }}</li>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form_group">
                                <label>les étudiants : </label>
                                @foreach ($etudiants as $etudiant)
                                    <div class="form-check form-check">
                                        <input type="checkbox" value="{{ $etudiant->etud_id }}" name="etudiants_ids[]" />
                                        <label class="form-check-label"
                                            for="inlineCheckbox1">{{ $etudiant->nom }}</label>
                                    </div>
                                @endforeach

                            </div>
                            <br />
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
