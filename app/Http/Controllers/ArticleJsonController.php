<?php

namespace EBN\Http\Controllers;

use Illuminate\Http\Request;
use EBN\Article;

class ArticleJsonController extends Controller
{
    /*
    |-----------------------------------------
    | ADD NEW ARTICLE
    |-----------------------------------------
    */
    public function addArticle(Request $request){
    	// body
    	$article = new Article();
    	$data    = $article->addNewArticle($request);

    	// return response.
    	return response()->json($data);
    }

    /*
    |-----------------------------------------
    | GET ALL ARTICLES
    |-----------------------------------------
    */
    public function getArticles(Request $request){
        // body
        $article = new Article();
        $data    = $article->getAllArticles($request);

        // return response.
        return response()->json($data);
    }

     /*
    |-----------------------------------------
    | GET ALL ARTICLE BY TITLE
    |-----------------------------------------
    */
    public function getArticleByTitle(Request $request, $title){
        // body

        // return $title;
        $article = new Article();
        $data    = $article->getClientArticleByTitle($title);

        // return response.
        return response()->json($data);
    }

    /*
    |-----------------------------------------
    | DELETE ARTICLE
    |-----------------------------------------
    */
    public function deleteArticle(Request $request){
        // body
        $article = new Article();
        $data    = $article->delArticle($request);

        // return response.
        return response()->json($data);
    }

    /*
    |-----------------------------------------
    | GET ARTICLE BY ID
    |-----------------------------------------
    */
    public function getArticle(Request $request, $id){
        // body
        $article = new Article();
        $data    = $article->getOneArticle($id);

        // return response.
        return response()->json($data);
    }

    /*
    |-----------------------------------------
    | GET RELATED ARTICLES
    |-----------------------------------------
    */
    public function getRelatedArticle(Request $request){
        // body
        $tags = [];
        
        $article = new Article();
        $data    = $article->getArticleByRelation($tags);

        // return response.
        return response()->json($data);
    }

    /*
    |-----------------------------------------
    | UPDATE ARTICLE
    |-----------------------------------------
    */
    public function updateArticle(Request $request){
        // body
        $article = new Article();
        $data    = $article->updateAnArticle($request);

        // return response.
        return response()->json($data);
    }

    /*
    |-----------------------------------------
    | UPDATE ARTICLE WITH REMOTE NEWS
    |-----------------------------------------
    */
    public function updateRemoteNews(Request $request){
        // body
        $article = new Article();
        $data    = $article->addRemoteNews($request);

        // return response.
        return response()->json($data);
    }
}
