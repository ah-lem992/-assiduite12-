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
                      @foreach ( $profs as $prof)

                      <tbody>
                        <tr>
                          <td>
                            {{$prof->id}}
                          </td>
                          <td>
                             {{$prof->nom}}
                          </td>
                          <td>
                            {{$prof->usertype}}
                         </td>
                          <td>
                            {{$prof->grade}}
                          </td>

                          <td>
                            <a href="" class="btn btn-primary">modifier</a>
                          </td>
                          <td>
                            <a href="" class="btn btn-danger">supprimer</a>
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

