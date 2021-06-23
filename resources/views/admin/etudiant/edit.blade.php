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

            <form  action="{{url('etudiant/'.$etudiant->etud_id)}}" method="POST" >

                {{ csrf_field() }}
                       <input type="hidden" name="_method" value="PUT">
                <br/>
                <div class="form-group">
                    <label for="exampleFormControlSelect1" >Sélectionnez promo</label>
                    <select class="form-control" name="promo_id"value="{{ old('promo_id') }}"  id="exampleFormControlSelect1">
                        @foreach ( $promos as $promo )

                      <option value="{{$promo->promo_id}}">{{$promo->annee}}</option>
                         @endforeach
                    </select>
                  </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1" >Sélectionnez Specialité</label>
                <select class="form-control" name="specialite_id" value="{{ old('specialite_id') }}" id="exampleFormControlSelect1">
                    @foreach ( $specialites as $specialite )
                  <option value="{{$specialite->specialite_id}}">{{$specialite->specialite}}</option>
                     @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1" >Sélectionnez groupe</label>
                <select class="form-control" name="groupe_id"value="{{ old('groupe_id') }}"  id="exampleFormControlSelect1">
                    @foreach ( $groupes as $groupe )

                  <option value="{{$groupe->groupe_id}}">{{$groupe->groupe}}</option>
                     @endforeach
                </select>
              </div>


                <div class="form-group">
                    <label >Nom  :</label>
                    <input type="text" name="nom" class="form-control" value="{{$etudiant-> nom}}" value="{{ old('nom') }}">
                    @if($errors->get('nom'))
                    @foreach ($errors ->get('nom') as $message )
                        <li> {{$message}}</li>
                    @endforeach
                    @endif


                </div>
                   <br/>
                   <div class="form-group">
                    <label >Identifiant  :</label>
                    <input type="text" name="prenom" class="form-control" value="{{$etudiant-> prenom}}" value="{{ old('prenom') }}">
                    @if($errors->get('prenom'))
                    @foreach ($errors ->get('prenom') as $message )
                        <li> {{$message}}</li>
                    @endforeach
                    @endif


                </div>
                <div class="form-check">
                    <label for="exampleFormControlSelect1" >Sexe :</label><br/>
                    <input class="form-check-input"  value="Homme" type="radio" name="sexe" id="flexRadioDefault1">

                    <label class="form-check-label" for="flexRadioDefault1">
                      Homme
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" value="Femme" type="radio" name="sexe" id="flexRadioDefault1">

                    <label class="form-check-label" for="flexRadioDefault1">
                      Femme
                    </label>
                  </div>
                  <br/>
                   <div class="form-group">
                    <label >Data de naissance :</label>
                    <input type="date" name="naissance" class="form-control" value="{{$etudiant-> naissance}}" value="{{ old('naissance') }}">
                    @if($errors->get('naissance'))
                    @foreach ($errors ->get('naissance') as $message )
                        <li> {{$message}}</li>
                    @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label >Numero  :</label>
                    <input type="phone" name="phone" class="form-control" value="{{$etudiant-> phone}}" value="{{ old('phone') }}">
                    @if($errors->get('phone'))
                    @foreach ($errors ->get('phone') as $message )
                        <li> {{$message}}</li>
                    @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label >Email  :</label>
                    <input type="email" name="email" class="form-control" value="{{$etudiant-> email}}" value="{{ old('email') }}">
                    @if($errors->get('email'))
                    @foreach ($errors ->get('email') as $message )
                        <li> {{$message}}</li>
                    @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label >Adresse  :</label>
                    <input type="text" name="adresse" class="form-control" value="{{$etudiant-> adresse}}" value="{{ old('adresse') }}">
                    @if($errors->get('adresse'))
                    @foreach ($errors ->get('adresse') as $message )
                        <li> {{$message}}</li>
                    @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label >Photo  :</label>
                    <td><input type="file" name="photo" class="form-control" value="{{$etudiant-> photo}}" value="{{ old('photo') }}"></td>
                    @if($errors->get('photo'))
                    @foreach ($errors ->get('photo') as $message )
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
</div>


</div>
</div>
</div>


@endsection
