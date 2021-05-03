@extends('layouts.master')
@section('title')
            Register attendance
@endsection

@section('content')
   <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">les comptes enregistrés </h4>
                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          phone
                        </th>
                        <th>
                        usertype
                         </th>
                        <th>
                          email
                        </th>
                        <th>
                          modifier
                        </th>
                        <th>
                            supprimer
                         </th>
                      </thead>
                      @foreach ( $users as $user)

                      <tbody>
                        <tr>
                          <td>
                            {{$user->id}}
                          </td>
                          <td>
                             {{$user->name}}
                          </td>
                          <td>
                            {{$user->phone}}
                         </td>
                          <td>
                            {{$user->usertype}}
                          </td>
                          <td>
                            {{$user->email}}
                          </td>
                          <td>
                            <a href="/role-edit/{{$user->id}}" class="btn btn-primary">modifier</a>
                          </td>
                          <td>
                            <a href="/role-delete/{{$user->id}}" class="btn btn-danger">supprimer</a>
                          </td>
                        </tr>

                      @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>


@endsection

@section('scripts')
@endsection

