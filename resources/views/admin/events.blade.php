@extends('layouts.admin-skin')

@section('title')
    Events
@endsection

@section('contents')

<div class="container">
  <div class="row">
    <div class="col-sm">
    <form>
  <div class="form-group">
    <label for="event name">Title of Event </label>
    <input type="text" class="form-control" id="Title" placeholder="Title of Event">
  </div>


<form action="/action_page.php">
 Start Time (date and time): <input type="datetime-local" name="Edaytime">
  
</form>

<br> <br>
<form action="/action_page.php">
 End Time (date and time): <input type="datetime-local" name="Edaytime">
  
</form>

</br> </br>

  <div class="form-group">
    <label for="Location">Location of Event </label>
    <input type="text" class="form-control" id="Location" placeholder="Location of Event">
  </div>


<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Select State</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>State</option>
    <option value="1">Abia State</option>
    <option value="2">Imo State</option>
    <option value="3">Benin State</option>
  </select>
</div>

<div class="form-group">
    <label for="EventPlanning">Short Note of Event </label>
    <textarea class="form-control" id="EventPlanning" rows="3"></textarea>
  </div>
</form>

    </div>
  </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        
    </script>
@endsection