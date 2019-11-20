@extends('layouts.admin-skin')

@section('title')
    Videos
@endsection

@section('contents')

<h1>

<strong>Video Uploading  </strong>
	<hr>

</h1>

<div class="container">
  <div class="row">
    <div class="col-sm">
    <form>
  <div class="form-group">
    <label for="Artis Name">Artis Name </label>
    <input type="text" class="form-control" id="artisname" placeholder="Artis Name">
  </div>

  <div class="form-group">
    <label for="Record Label">Record Label </label>
    <input type="text" class="form-control" id="RecordLabel" placeholder="Record Label">
  </div>

  <div class="form-group">
    <label for="video type">Video Type </label>
    <input type="text" class="form-control" id="videoType" placeholder="video Type">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">About song </label>
    <textarea class="form-control" id="aboutsong" rows="3"></textarea>
  </div>
</form>

<form>
  <div class="form-group">
    <label for="upload">Upload your Video Music</label> <br>
    <input type="file" class="upload" id="upload">
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