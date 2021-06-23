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
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <h4 class="card-title ">Emploi du temps
                            <a href="{{ url('seance/create') }}" class="btn btn-success"> Nouveau</a>
                        </h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>id </th>
                                            <th>promo</th>
                                            <th>cour </th>
                                            <th>type </th>
                                            <th>prof </th>
                                            <th>salle </th>
                                            <th>le jour</th>
                                            <th>H d'entré</th>
                                            <th>H d'sortie</th>
                                            <th>editer /supprimer</th>
                                        </tr>

                                        <body>
                                            @foreach ($seances as $seance)
                                                <tr>
                                                    <td>{{ $seance->id }}</td>
                                                    <td> {{ $seance->promo_id }}</td>
                                                    <td> {{ $seance->cour_id }}</td>
                                                    <td>{{ $seance->type }}</td>
                                                    <td>{{ $seance->prof_id }}</td>
                                                    <td>{{ $seance->salle->num }}</td>
                                                    <td>{{ $seance->day }}</td>
                                                    <td>{{ $seance->start_time }}</td>
                                                    <td>{{ $seance->end_time }}</td>




                                                    <!--  <a href="" class="btn btn-success"> nouvelle année</a>-->
                                                    <td>

                                                        <a href="{{ url('seance/' . $seance->id) }}"
                                                            class="btn btn-primary">mod</a>
                                                        <button type="submit" class="btn btn-danger deletebtn">Supp</button>
                                                        </form>
                                                    </td>

                                                </tr>

                                            @endforeach

                                        </body>
                                </table>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
