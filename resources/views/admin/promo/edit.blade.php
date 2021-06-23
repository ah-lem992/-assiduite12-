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
                        <h4 class="card-title ">Les promos</h4>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">

                                    <body>

                                        <form action="{{ url('promo/' . $promo->id) }}" method="post">

                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="PUT">
                                            <br />
                                            <div class="form-group">
                                                <label for="">Année </label>
                                                <input type="text" name="annee" class="form-control"
                                                    value="{{ $promo->annee }}" value="{{ old('annee') }}">

                                                @if ($errors->get('annee'))
                                                    @foreach ($errors->get('annee') as $message)
                                                        <li> {{ $message }}</li>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <br />

                                            <div class="form-group">

                                                <input type="submit" class="form-control btn btn-primary"
                                                    value="modifier  ">
                                            </div>
                                        </form>

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
@section('scripts')
@endsection
