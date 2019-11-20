<?php

namespace EBN\Http\Controllers;

use Illuminate\Http\Request;
use EBN\Article;
use EBN\Comment;
use EBN\Music;

class ExternalPageController extends Controller
{
    /*
    |-----------------------------------------
    | SHOW WELCOME PAGE
    |-----------------------------------------
    */
    public function index(){
    	// body
        $featured_articles = Article::orderBy('updated_at', 'DESC')->limit('5')->get()->shuffle();
    	return view('welcome', compact('featured_articles'));
    }

    /*
    |-----------------------------------------
    | EVENTS
    |-----------------------------------------
    */
    public function events(){
    	// body
    	return view('pages.events');
    }

    /*
    |-----------------------------------------
    | MUSICS
    |-----------------------------------------
    */
    public function musics(){
    	// body
        $musics = Music::orderBy('created_at', 'DESC')->get();

        // return $musics;
    	return view('pages.musics', compact('musics'));
    }

    /*
    |-----------------------------------------
    | MUSICS
    |-----------------------------------------
    */
    public function music(Request $request, $id){
        // body
        $music = Music::where("id", $id)->first();
        $musics = Music::orderBy("created_at")->limit(10)->get()->shuffle();
        if($music == null){
            return redirect()->back();
        }else{
           // return $musics;
            return view('pages.music', compact('music', 'musics', 'id')); 
        }
    }


    /*
    |-----------------------------------------
    | ARTICLES
    |-----------------------------------------
    */
    public function articles(){
    	// body
        $featured_articles = Article::orderBy('updated_at', 'DESC')->limit('5')->get();
        $articles = Article::orderBy('updated_at', 'DESC')->limit('20')->get();

    	return view('pages.articles', compact('articles', 'featured_articles'));
    }

    /*
    |-----------------------------------------
    | ARTICLE SINGLE
    |-----------------------------------------
    */
    public function article(Request $request, $id){
    	// body
        $article = Article::where('id', $id)->first();

        // return $article->comments->user;
    	return view('pages.article', compact('article'));
    }

    /*
    |-----------------------------------------
    | ARTICLE SINGLE
    |-----------------------------------------
    */
    public function articleByTitle(Request $request, $title){
        // body
        $id = $request->id;

        // return $id;
        $article = Article::where('id', $id)->first();

        // return $article->comments->user;
        return view('pages.article', compact('article'));
    }

    /*
    |-----------------------------------------
    | SHOWS LIKE EVENTS
    |-----------------------------------------
    */
    public function shows(){
    	// body
    	return view('pages.shows');
    }

    /*
    |-----------------------------------------
    | TOP PLAYED CHARTS
    |-----------------------------------------
    */
    public function charts(){
    	// body
    	return view('pages.charts');
    }

    /*
    |-----------------------------------------
    | TOP PLAYED LYRICS SEARCH
    |-----------------------------------------
    */
    public function lyrics(){
        // body
        return view('pages.lyrics');
    }    
    
    /*
    |-----------------------------------------
    | TOP PLAYED CHARTS
    |-----------------------------------------
    */
    public function privacyPolicy(){
        // body
        return view('pages.privacy-policy');
    }

    /*
    |-----------------------------------------
    | TOP PLAYED CHARTS
    |-----------------------------------------
    */
    public function termsConditions(){
        // body
        return view('pages.terms-conditions');
    }

    /*
    |-----------------------------------------
    | GOOGLE FILE
    |-----------------------------------------
    */
    public function googleFile(){
        // body
        return view('pages.google-file');
    }
}
