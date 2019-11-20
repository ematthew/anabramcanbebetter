<?php

namespace EBN\Http\Controllers;

use Illuminate\Http\Request;
use EBN\Article;

class ClientJsonResponseController extends Controller
{
    /*
    |-----------------------------------------
    | GET ALL ARTICLES
    |-----------------------------------------
    */
    public function fetchArticles(Request $request){
    	// body
    	$all_articles = new Article();
    	$data         = $all_articles->getAllArticlesClients();

    	// return response.
    	return response()->json($data);
    }

    /*
    |-----------------------------------------
    | func_desc
    |-----------------------------------------
    */
    public function fetchTrendingArticles(Request $request){
        // body
        $all_articles = new Article();
        $data         = $all_articles->getTrendingArticle();

        // return response.
        return response()->json($data);
    }
}
