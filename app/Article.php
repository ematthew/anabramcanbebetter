<?php

namespace EBN;

use Illuminate\Database\Eloquent\Model;
use EBN\Comment;
use EBN\ArticleSource;
use EBN\ArticleAuthor;
use Auth;

class Article extends Model
{
    /*
    |-----------------------------------------
    | RELATE WITH COMMENTS
    |-----------------------------------------
    */
    public function comments(){
        // body
        return $this->hasMany(Comment::class, 'article_id');
    }

    /*
    |-----------------------------------------
    | ADD NEW ARTICLE
    |-----------------------------------------
    */
    public function addNewArticle($payload){
    	// body
    	if(empty($payload->avatar)){
    		$payload->avatar = 'https://res.cloudinary.com/delino12/image/upload/v1562252126/resume/paklkhw4lutndzz6mfmo.jpg';
    	}
    	
    	$new_article 			= new Article();
    	$new_article->title 	= $payload->title;
    	$new_article->contents 	= $payload->contents;
    	$new_article->avatar 	= $payload->avatar;
    	$new_article->category 	= $payload->category;
    	$new_article->status 	= 1;
    	if($new_article->save()){

            $article_author             = new ArticleAuthor();
            $article_author->admin_id   = Auth::guard('admin')->user()->id;
            $article_author->article_id = $new_article->id;
            $article_author->save();

    		$data = [
    			'status' 	=> 'success',
    			'message' 	=> 'Article saved!'
    		];
    	}else{
    		$data = [
    			'status' 	=> 'error',
    			'message' 	=> 'Failed to save article'
    		];
    	}

    	// data
    	return $data;
    }

    /*
    |-----------------------------------------
    | UPDATE ARTICLE
    |-----------------------------------------
    */
    public function updateAnArticle($payload){
        // body
        if(empty($payload->avatar)){
            $payload->avatar = 'https://res.cloudinary.com/delino12/image/upload/v1562252126/resume/paklkhw4lutndzz6mfmo.jpg';
        }
        
        $article = Article::find($payload->article_id);
        if($article !== null){
            $article->title     = $payload->title;
            $article->contents  = $payload->contents;
            $article->avatar    = $payload->avatar;
            $article->category  = $payload->category;
            $article->status    = 1;
            if($article->update()){
                $data = [
                    'status'    => 'success',
                    'message'   => 'Article updated!'
                ];
            }else{
                $data = [
                    'status'    => 'error',
                    'message'   => 'Failed to update article'
                ];
            }
        }else{
            $data = [
                'status'    => 'error',
                'message'   => 'Article does not exist!'
            ];
        }    

        // data
        return $data;
    }

    /*
    |-----------------------------------------
    | GET ALL ARTICLES
    |-----------------------------------------
    */
    public function getAllArticles($payload){
        // body
        $articles = Article::orderBy('created_at', 'DESC')->get();

        // data
        return $articles;
    }

    /*
    |-----------------------------------------
    | GET ALL THE ARTICLES ON CLIENT AREA
    |-----------------------------------------
    */
    public function getAllArticlesClients(){
        // body
        $articles = Article::orderBy('created_at', 'DESC')->limit('60')->get();
        $filtered = [];
        foreach ($articles as $key => $value) {
            $article = [
                'id'            => $value->id,
                'title'         => $value->title,
                'link_title'    => str_replace(' ', '-', $value->title),
                'contents'      => $value->contents,
                'avatar'        => $value->avatar,
                'status'        => $value->status,
                'created_at'    => $value->created_at->isoFormat('dddd D Y'),
                'updated_at'    => $value->updated_at,
            ];

            array_push($filtered, $article);
        }

        // data
        return $filtered;
    }

    /*
    |-----------------------------------------
    | GET ALL THE ARTICLES ON CLIENT AREA
    |-----------------------------------------
    */
    public function getClientArticleByTitle($article_title){
        // body
        $article = Article::where('title', $article_title)->first();

        // return 
        return $article;
    }

    /*
    |-----------------------------------------
    | GET SHUFFLED ARTICLES
    |-----------------------------------------
    */
    public function getTrendingArticle(){
        // body
        $articles = Article::orderBy('created_at', 'DESC')->limit('10')->get()->shuffle();
        $filtered = [];
        foreach ($articles as $key => $value) {
            $article = [
                'id'            => $value->id,
                'title'         => $value->title,
                'link_title'    => str_replace(' ', '-', $value->title),
                'contents'      => $value->contents,
                'avatar'        => $value->avatar,
                'status'        => $value->status,
                'created_at'    => $value->created_at->isoFormat('dddd D Y'),
                'updated_at'    => $value->updated_at,
            ];

            array_push($filtered, $article);
        }

        // data
        return $filtered;
    }


    /*
    |-----------------------------------------
    | GET RELATED ARTICLES 
    |-----------------------------------------
    */
    public function getArticleByRelation($tags){
        // body
        $articles = Article::orderBy('created_at', 'DESC')->limit('3')->get()->shuffle();
        $filtered = [];
        foreach ($articles as $key => $value) {
            $article = [
                'id'            => $value->id,
                'title'         => $value->title,
                'link_title'    => str_replace(' ', '-', $value->title),
                'contents'      => $value->contents,
                'avatar'        => $value->avatar,
                'status'        => $value->status,
                'created_at'    => $value->created_at->isoFormat('dddd D Y'),
                'updated_at'    => $value->updated_at,
            ];

            array_push($filtered, $article);
        }

        // data
        return $filtered;
    }

    /*
    |-----------------------------------------
    | DELETE ARTICLE
    |-----------------------------------------
    */
    public function delArticle($payload){
        // body
        $article = Article::find($payload->article_id);
        if($article !== null){
            if($article->delete()){
                $data = [
                    'status'    => 'success',
                    'message'   => 'Article Deleted!'
                ];
            }else{
                $data = [
                    'status'    => 'error',
                    'message'   => 'Failed to delete article!'
                ];
            }
        }else{
            $data = [
                'status'    => 'error',
                'message'   => 'Article not found!'
            ];
        }

        // return 
        return $data;
    }

    /*
    |-----------------------------------------
    | GET ONE ARTICLE
    |-----------------------------------------
    */
    public function getOneArticle($article_id){
        // body
        $article = Article::where('id', $article_id)->first();

        // return 
        return $article;
    }

    /*
    |-----------------------------------------
    | ADD REMOTE NEWS
    |-----------------------------------------
    */
    public function addRemoteNews($payload){
        // body
        $news_url   = "https://newsapi.org/v2/top-headlines";
        $api_key    = "7d8d32b47d9e4631824cfa3cb64702a7";
        $channel    = $payload->filter;
        $filter     = $payload->channel;

        switch ($filter) {
            case 1:
                # code...
                $endpoint = $news_url."?sources=$channel&apiKey=$api_key";
                break;
            
            case 9:
                # code...
                $endpoint = $news_url."?country=ng&category=business&apiKey=$api_key";
                break;

            default:
                # code...
                $endpoint = $news_url."?country=ng&category=business&apiKey=$api_key";
                break;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 200);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        $res = curl_exec($ch);
        $data = json_decode($res, true);

        if($data !== null){
            $total = 0;
            foreach ($data['articles'] as $el) {
                if($el['title'] !== null && $el['description'] !== null && $el['urlToImage'] !== null){
                    $title      = str_replace("'", "", $el['title']);
                    $contents   = str_replace('"', '', $el['description']);
                    $avatar     = str_replace('http://', 'https://', $el['urlToImage']);
                    $source     = $el['source']['name'];
                    $author     = $el['author'];
                    $location   = "NG";

                    $new_article            = new Article();
                    $new_article->title     = $title;
                    $new_article->contents  = $contents;
                    $new_article->avatar    = $avatar;
                    $new_article->category  = 1;
                    $new_article->status    = 1;
                    if($new_article->save()){
                        $article_id = $new_article->id;

                        $article_source = new ArticleSource();
                        $article_source->addToSource($article_id, $source, $author, $location);

                        $total++;
                    }
                }
            }
            $data = [
                'status'    => 'error',
                'message'   => $total.' article was uploaded!'
            ];;
        }else{
            $data = [
                'status'    => 'error',
                'message'   => 'No news article was uploaded!'
            ];;
        }

        // return
        return $data;
    }
}
