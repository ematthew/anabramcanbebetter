<?php

namespace EBN;

use Illuminate\Database\Eloquent\Model;

class MusicApi extends Model
{
    /*
    |-----------------------------------------
    | FETCH MUSICS
    |-----------------------------------------
    */
    public function search($query){
    	// body
    	$query = "eminem";
    	$endpoint = "https://deezerdevs-deezer.p.rapidapi.com/search?q=$query";
    	$headers = array(
    		'X-RapidAPI-Host' => 'deezerdevs-deezer.p.rapidapi.com',
    		'X-RapidAPI-Key' => 'd791aee083msh80400db9ca623b4p194c82jsn64602fd48536'
    	);

    	$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 200);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_HEADER, $headers);
        $res = curl_exec($ch);
        $data = json_decode($res, true);

        return $res;
    }
}
