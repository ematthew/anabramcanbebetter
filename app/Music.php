<?php

namespace EBN;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    /*
    |-----------------------------------------
    | ADD NEW MUSIC
    |-----------------------------------------
    */
    public function addMusic($payload){
    	// body
    	$payload->status = 0;

    	$new_music 					= new Music();
    	$new_music->audio_file 		= $payload->audio_file;
    	$new_music->audio_art 		= $payload->audio_art;
    	$new_music->track_title 	= $payload->track_title;
    	$new_music->artiste_name 	= $payload->artiste_name;
    	$new_music->record_label 	= $payload->record_label;
    	$new_music->album_name 		= $payload->album_name;
    	$new_music->music_genre 	= $payload->music_genre;
    	$new_music->about_track 	= $payload->about_track;
    	$new_music->about_artiste 	= $payload->about_artiste;
    	$new_music->status 			= $payload->status;
    	if($new_music->save()){
    		$data = [
    			'status' 	=> 'success',
    			'message' 	=> 'Music uploaded successfully!'
    		];
    	}else{
    		$data = [
    			'status' 	=> 'error',
    			'message' 	=> 'Failed to upload music!'
    		];
    	}

    	// return
    	return $data;
    }

    /*
    |-----------------------------------------
    | FETCH ALL MUSICS
    |-----------------------------------------
    */
    public function fetchAllMusics(){
    	// body
    	$musics = Music::orderBy('created_at', 'DESC')->get();
    	$musics_box = [];

    	foreach ($musics as $key => $value) {
    		$music = [
    			'id' 			=> $value->id,
    			'audio_file' 	=> $value->audio_file,
    			'audio_art' 	=> $value->audio_art,
    			'track_title' 	=> $value->track_title,
    			'artiste_name' 	=> $value->artiste_name,
    			'record_label'	=> $value->record_label,
    			'music_genre' 	=> $value->music_genre,
    			'album_name'    => $value->album_name,
    			'about_track' 	=> $value->about_track,
    			'about_artiste' => $value->about_artiste,
    			'status' 		=> $value->status,
    			'created_at'    => $value->created_at->isoFormat('dddd D Y'),
                'updated_at'    => $value->updated_at,
    		];

    		array_push($musics_box, $music);
    	}

    	return $musics_box;
    }
}
