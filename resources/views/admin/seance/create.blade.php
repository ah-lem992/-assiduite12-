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

<form action="{{url('/seance')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlSelect1" >selectionez cour</label>
      <select class="form-control" name="cour_id" id="exampleFormControlSelect1">
          @foreach ( $cours as $cour )

        <option value="{{$cour->cour_id}}">{{$cour->nom}}</option>
           @endforeach
      </select>
      @if($errors->get('cour_id'))
      @foreach ($errors ->get('cour_id') as $message )
          <li> {{$message}}</li>
      @endforeach
      @endif
    </div>


    <div class="form-group">
    <div class="form-check">
        <label for="exampleFormControlSelect1" >Type de module :</label><br/>
        <input class="form-check-input"  value="Cour" type="radio" name="type" id="flexRadioDefault1">

        <label class="form-check-label" for="flexRadioDefault1">
          cour
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" value="td" type="radio" name="type" id="flexRadioDefault1">

        <label class="form-check-label" for="flexRadioDefault1">
          Td
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" value="tp" type="radio" name="type" id="flexRadioDefault2" >

        <label class="form-check-label" for="flexRadioDefault2">
          Tp
        </label>
      </div>
      @if($errors->get('type'))
      @foreach ($errors ->get('type') as $message )
          <li> {{$message}}</li>
      @endforeach
      @endif
    </div>



    <div class="form-group">
        <label for="exampleFormControlSelect1" >selectionez prof</label>
        <select class="form-control" name="prof_id" id="exampleFormControlSelect1">
            @foreach ( $profs as $prof )

          <option value="{{$prof->prof_id}}">{{$prof->nom}}</option>
             @endforeach
        </select>

      </div>








      <div class="form-group">
        <label for="exampleFormControlSelect1" >selectionez salle</label>
        <select class="form-control" name="salle_id" id="exampleFormControlSelect1">
            @foreach ( $salles as $salle )

          <option value="{{$salle->salle_id}}">{{$salle->num}}</option>
             @endforeach
        </select>
        @if($errors->get('salle_id'))
        @foreach ($errors ->get('salle_id') as $message )
            <li> {{$message}}</li>
        @endforeach
        @endif
      </div>
      <div class="form-group">
        <label for="" >selectionez le jour</label>
        <select class="form-control" name="day" id="jour">
            <option value="Dimanche">Dimanche</option>
            <option value="Lundi">Lundi</option>
            <option value="Mardi">Mardi</option>
            <option value="Merecredi">Merecredi</option>
            <option value="Jeudi">Jeudi</option>
            <option value="Vendredi">Vendredi</option>

      </select>
      @if($errors->get('day'))
      @foreach ($errors ->get('day') as $message )
          <li> {{$message}}</li>
      @endforeach
      @endif

    </div>
    <div class="form-group">
        <label for="" >selectionez l'heure d'entré</label>
        <input class="form-control" type="time" value="" name="start_time">
        @if($errors->get('start_time'))
        @foreach ($errors ->get('start_time') as $message )
            <li> {{$message}}</li>
        @endforeach
        @endif
    </div>
    <div class="form-group">
        <label for="" >selectionez l'heure de sortie </label>
        <input class="form-control" type="time" value="" name="end_time">
        @if($errors->get('end_time'))
        @foreach ($errors ->get('end_time') as $message )
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

@endsection
@section('scripts')
<script>
    var nativePicker = document.querySelector('.nativeDateTimePicker');
var fallbackPicker = document.querySelector('.fallbackDateTimePicker');
var fallbackLabel = document.querySelector('.fallbackLabel');

var yearSelect = document.querySelector('#year');
var monthSelect = document.querySelector('#month');
var daySelect = document.querySelector('#day');
var hourSelect = document.querySelector('#hour');
var minuteSelect = document.querySelector('#minute');

// hide fallback initially
fallbackPicker.style.display = 'none';
fallbackLabel.style.display = 'none';

// test whether a new datetime-local input falls back to a text input or not
var test = document.createElement('input');

try {
  test.type = 'datetime-local';
} catch (e) {
  console.log(e.description);
}

// if it does, run the code inside the if() {} block
if(test.type === 'text') {
  // hide the native picker and show the fallback
  nativePicker.style.display = 'none';
  fallbackPicker.style.display = 'block';
  fallbackLabel.style.display = 'block';

  // populate the days and years dynamically
  // (the months are always the same, therefore hardcoded)
  populateDays(monthSelect.value);
  populateYears();
  populateHours();
  populateMinutes();
}

function populateDays(month) {
  // delete the current set of <option> elements out of the
  // day <select>, ready for the next set to be injected
  while(daySelect.firstChild){
    daySelect.removeChild(daySelect.firstChild);
  }

  // Create variable to hold new number of days to inject
  var dayNum;

  // 31 or 30 days?
  if(month === 'January' || month === 'March' || month === 'May' || month === 'July' || month === 'August' || month === 'October' || month === 'December') {
    dayNum = 31;
  } else if(month === 'April' || month === 'June' || month === 'September' || month === 'November') {
    dayNum = 30;
  } else {
  // If month is February, calculate whether it is a leap year or not
    var year = yearSelect.value;
    var isLeap = new Date(year, 1, 29).getMonth() == 1;
    isLeap ? dayNum = 29 : dayNum = 28;
  }

  // inject the right number of new <option> elements into the day <select>
  for(i = 1; i <= dayNum; i++) {
    var option = document.createElement('option');
    option.textContent = i;
    daySelect.appendChild(option);
  }

  // if previous day has already been set, set daySelect's value
  // to that day, to avoid the day jumping back to 1 when you
  // change the year
  if(previousDay) {
    daySelect.value = previousDay;

    // If the previous day was set to a high number, say 31, and then
    // you chose a month with less total days in it (e.g. February),
    // this part of the code ensures that the highest day available
    // is selected, rather than showing a blank daySelect
    if(daySelect.value === "") {
      daySelect.value = previousDay - 1;
    }

    if(daySelect.value === "") {
      daySelect.value = previousDay - 2;
    }

    if(daySelect.value === "") {
      daySelect.value = previousDay - 3;
    }
  }
}

function populateYears() {
  // get this year as a number
  var date = new Date();
  var year = date.getFullYear();

  // Make this year, and the 100 years before it available in the year <select>
  for(var i = 0; i <= 100; i++) {
    var option = document.createElement('option');
    option.textContent = year-i;
    yearSelect.appendChild(option);
  }
}

function populateHours() {
  // populate the hours <select> with the 24 hours of the day
  for(var i = 0; i <= 23; i++) {
    var option = document.createElement('option');
    option.textContent = (i < 10) ? ("0" + i) : i;
    hourSelect.appendChild(option);
  }
}

function populateMinutes() {
  // populate the minutes <select> with the 60 hours of each minute
  for(var i = 0; i <= 59; i++) {
    var option = document.createElement('option');
    option.textContent = (i < 10) ? ("0" + i) : i;
    minuteSelect.appendChild(option);
  }
}

// when the month or year <select> values are changed, rerun populateDays()
// in case the change affected the number of available days
yearSelect.onchange = function() {
  populateDays(monthSelect.value);
}

monthSelect.onchange = function() {
  populateDays(monthSelect.value);
}

//preserve day selection
var previousDay;

// update what day has been set to previously
// see end of populateDays() for usage
daySelect.onchange = function() {
  previousDay = daySelect.value;
}
</script>
@endsection
