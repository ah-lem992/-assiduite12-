@extends('layouts.master')
@section('title')
            Modifier utilisateur
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Modifier les access   </h4>
                <div class="card-body">
                   <form action="{{url('role-register-update/'.$users->id)}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                       <div class ="form-group">
                            <label >Nom  </label>
                            <input  type="text" name="username"  value="{{$users->name}}"  class="form-control "/>
                       </div>
                       <div class ="form-group">
                           <label >Donner l'acces   </label>
                           <select name="usertype" class="form-control">
                               <option value="admin" >admin</option>
                               <option value="teacher">teacher</option>
                               <option value="student">student</option>

                           </select>
                       </div>
                       <button type="submit " class="btn btn-success">Enregistrer </button>
                       <a href="/role-register " class="btn btn-danger">annuler </a>
                   </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>



@endsection
