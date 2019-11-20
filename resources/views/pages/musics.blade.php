@extends('layouts.web-skin')

@section('title')
    Musics
@endsection

@section('contents')
	<!-- Single Razo Event Area -->
    <div class="container">
        <div class="row section-padding-80">
            <div class="col-md-12">
                <form onsubmit="return searchMusicDatabase()" method="POST">
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <input type="text" class="form-control" placeholder="Eg, Eminem, J Cole" id="keywords" name="">
                        </div>
                        <div class="form-group col-sm-2">
                            <button class="btn btn-razo btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row section-padding-80">
            <div class="col-md-12" id="search-results"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach($musics as $music)
                <div class="row">
                    <!-- Thumbnail -->
                    <div class="col-md-2">
                        <div style="background: url({{ $music->audio_art }});height: 180px; width: 180px;background-repeat: no-repeat;background-size: contain;border-radius: 10px;"></div>
                    </div>
                    <!-- Event Content -->
                    <div class="col-md-10">
                        <div class="event-text">
                            <h5>
                                <a href="{{ url('music') }}/{{ $music->id }}">
                                    {{ $music->artiste_name }} - {{ $music->track_title }}
                                </a>
                            </h5>
                           {{--  <div class="event-meta">
                              <audio controls>
                                <source src="{{ $music->audio_file }}" type="audio/ogg">
                                <source src="{{ $music->audio_file }}" type="audio/mpeg">
                              Your browser does not support the audio element.
                              </audio>
                            </div>
                            <div class="float-right small">
                                <a href="javascript:void(0);" onclick="showMusicDetails()" class="pl-20" style="font-size: 13px;">
                                  <i class="fa fa-thumbs-up"></i> Like
                                </a>
                                <a href="javascript:void(0);" onclick="showMusicDetails()" class="pl-20" style="font-size: 13px;">
                                  <i class="fa fa-thumbs-down"></i> Unlike
                                </a>
                                <a href="{{ $music->audio_file }}" target="_blank" onclick="downloadMusic()" class="pl-20" style="font-size: 13px;" download>
                                  <i class="fa fa-download"></i> Download
                                </a>
                            </div> --}}
                            
                        </div>
                    </div>
                </div>
                <br />
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function downloadMusic() {
            // do something new
            return true;
        }

        function searchMusicDatabase() {
            var _token = $("#token").val();
            var keywords = $("#keywords").val();

            fetch(`https://deezerdevs-deezer.p.rapidapi.com/search?q=${keywords}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-RapidAPI-Host': 'deezerdevs-deezer.p.rapidapi.com',
                    'X-RapidAPI-Key': 'd791aee083msh80400db9ca623b4p194c82jsn64602fd48536'
                }
            }).then(r => {
                return r.json();
            }).then(results => {
                console.log(results);
                $("#search-results").html("");
                $.each(results.data, function(index, val) {
                    $("#search-results").append(`
                        <div class="row">
                            <!-- Thumbnail -->
                            <div class="col-md-2">
                                <img src="${val.artist.picture_medium}" style="max-width: 80%;border-radius: 1rem;" alt="">
                            </div>
                            <!-- Event Content -->
                            <div class="col-md-10">
                                <div class="event-text">
                                    <h5>${val.artist.name} - ${val.title}</h5>
                                    <div class="event-meta">
                                      <audio controls>
                                        <source src="${ val.preview }" type="audio/ogg">
                                        <source src="${ val.preview }" type="audio/mpeg">
                                      Your browser does not support the audio element.
                                      </audio>
                                    </div>
                                    <div class="float-right small">
                                        <a href="javascript:void(0);" onclick="showMusicDetails()" class="pl-20" style="font-size: 13px;">
                                          <i class="fa fa-thumbs-up"></i> Like
                                        </a>
                                        <a href="javascript:void(0);" onclick="showMusicDetails()" class="pl-20" style="font-size: 13px;">
                                          <i class="fa fa-thumbs-down"></i> Unlike
                                        </a>
                                        <a href="${ val.preview }" onclick="downloadMusic()" class="pl-20" style="font-size: 13px;" download>
                                          <i class="fa fa-download"></i> Download
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <br />
                    `);
                });
            }).catch(err => {
                console.log(JSON.stringify(err));
            })

            // return
            return false;
        }
    </script>
@endsection