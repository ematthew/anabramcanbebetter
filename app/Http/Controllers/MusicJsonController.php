<?php

namespace EBN\Http\Controllers;

use Illuminate\Http\Request;
use EBN\Music;
use EBN\MusicApi;

class MusicJsonController extends Controller
{
    /*
    |-----------------------------------------
    | ADD NEW MUSIC FILE
    |-----------------------------------------
    */
    public function addNewMusic(Request $request){
    	// body
    	$new_music = new Music();
    	$data      = $new_music->addMusic($request);

    	// return response.
    	return response()->json($data);
    }

    /*
    |-----------------------------------------
    | GET ALL MUSICS
    |-----------------------------------------
    */
    public function getAllMusics(){
    	// body
    	$musics 	= new Music();
    	$data      	= $musics->fetchAllMusics();

    	// return response.
    	return response()->json($data);
    }

    /*
    |-----------------------------------------
    | SEARCH MUSICS
    |-----------------------------------------
    */
    public function searchMusics(Request $request){
        // body
        $musics     = new MusicApi();
        $data       = $musics->search($request->keywords);

        // return response.
        return response()->json($data);
    }
}
