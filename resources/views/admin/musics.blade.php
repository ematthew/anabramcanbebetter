@extends('layouts.admin-skin')

@section('title')
    Musics
@endsection

@section('contents')

<div class="container">
  <div class="row section-padding-80">
    <div class="col-md-12">
      <h1><strong> Musics </strong>
        <button class="btn razo-btn w-10 float-right" onclick="showAddMusicModal()">
          Upload Music
        </button>
      </h1>
      <hr />
    </div>
  </div>
  <br />
  <div class="row">
    <div id="load-musics"></div>
  </div>
</div>

{{-- Modal Section --}}
@include('admin.modals')

@endsection

@section('scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        fetchAllMusics();
        $('#about_track').summernote('destroy');
        $('#about_artiste').summernote('destroy');

        $('#about_track').summernote({
          placeholder: "Tell us more about this track...",
          height: 100,
          tabsize: 4,
          popover: {
            image: [],
            link: [],
            air: []
          }
        });
        $('#about_artiste').summernote({
          placeholder: "Tell us more about this artiste...",
          height: 100,
          tabsize: 4,
          popover: {
            image: [],
            link: [],
            air: []
          }
        });
      })

      function showAddMusicModal() {
        $("#add-new-music-modal").modal();
      }

      function uploadNewMusic() {
        var _token        = $("#token").val();
        var audio_file    = $("#audio_file").val();
        var audio_art     = $("#audio_art").val();
        var track_title   = $("#track_title").val();
        var artiste_name  = $("#artiste_name").val();
        var record_label  = $("#record_label").val();
        var album_name    = $("#album_name").val();
        var music_genre   = $("#music_genre").val();
        var about_track   = $("#about_track").val();
        var about_artiste = $("#about_artiste").val();

        fetch("{{url('add/new/music')}}", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({_token, audio_file, audio_art, track_title, artiste_name,record_label, album_name, music_genre, about_track, about_artiste})
        }).then(r => {
          return r.json();
        }).then(results => {
          console.log(results)
          if(results.status == "success"){
            fetchAllMusics();
            swal(
              "Ok",
              results.message,
              results.status
            );
          }else{
            swal(
              "Oops!",
              results.message,
              results.status
            );
          }
        }).catch(err => {
          console.log(JSON.stringify(err));
        })

        // void form
        return false;
      }

      function fetchAllMusics() {
        fetch("{{url('get/all/musics')}}", {
          method: 'GET',
          headers: {
            'Content-Type': 'application/json',
          }
        }).then(r => {
          return r.json();
        }).then(results => {
          console.log(results)
          $("#load-articles").html("");
          var sn = 0;
          $.each(results, function(index, val) {
            sn++;
            $("#load-musics").append(`
              <!-- Single Razo Event Area -->
                  <div class="col-12">
                      <div class="single-razo-event-area d-flex flex-wrap align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                          <!-- Thumbnail -->
                          <div class="event-thumbnail">
                              <img src="${val.audio_art}" width="150" height="180" alt="">
                          </div>
                          <!-- Event Content -->
                          <div class="event-content d-flex align-items-center">
                              <div class="event-text">
                                  <h5>${val.artiste_name} - ${val.track_title}</h5>
                                  <div class="event-meta">
                                    <audio controls>
                                      <source src="${val.audio_file}" type="audio/ogg">
                                      <source src="${val.audio_file}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                    </audio>
                                  </div>
                                  <p>${truncate(val.about_track, 150, '...')}</p>
                                  <a href="#" class="btn read-more-btn">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>

                                  <a href="javascript:void(0);" onclick="showEditArticle()" class="float-right">
                                    <i class="fa fa-edit"></i>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>

            `);
          });
        }).catch(err => {
          console.log(JSON.stringify(err));
        })
      }

      var myWidget = cloudinary.createUploadWidget({
        cloudName: 'delino12', 
        uploadPreset: 'ebnmedia'}, (error, result) => { 
          if (!error && result && result.event === "success") { 
              // console.log('Done! Here is the image info: ', result.info);
              $("#audio_file").val(`${result.info.secure_url}`);
              $("#preview-audio").append(`
                <audio controls>
                  <source src="${result.info.secure_url}" type="audio/ogg">
                  <source src="${result.info.secure_url}" type="audio/mpeg">
                Your browser does not support the audio element.
                </audio>
              `);
          }
        }
      )

      var myArtWidget = cloudinary.createUploadWidget({
        cloudName: 'delino12', 
        uploadPreset: 'ebnmedia'}, (error, result) => { 
          if (!error && result && result.event === "success") { 
              // console.log('Done! Here is the image info: ', result.info);
              $("#audio_art").val(`${result.info.secure_url}`);
              $("#preview-art").append(`
                <img src="${result.info.secure_url}" class="img-rounded img-responsive" width="100%" height="200" />
              `);
          }
        }
      )

      document.getElementById("upload_music_widget").addEventListener("click", function(){
          myWidget.open();
      }, false);

      document.getElementById("upload_art_widget").addEventListener("click", function(){
          myArtWidget.open();
      }, false);

        function truncate(string, length, delimiter) {
       delimiter = delimiter || "&hellip;";
       return string.length > length ? string.substr(0, length) + delimiter : string;
    };
    </script>
@endsection