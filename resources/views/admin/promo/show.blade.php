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
                        <h4 class="card-title "></h4>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th> groupe id </th>
                                            <th> specialité id </th>

                                        </tr>

                                        <tbody>


                                            @foreach ($groupes as $groupe)
                                                <tr>
                                                    <td> {{$groupe->groupe_id}}</td>
                                                    <td>{{$groupe->groupe}}</td>

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
