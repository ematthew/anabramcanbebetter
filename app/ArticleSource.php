<?php

namespace EBN;

use Illuminate\Database\Eloquent\Model;

class ArticleSource extends Model
{
    /*
    |-----------------------------------------
    | ADD ARTICLE SOURCE
    |-----------------------------------------
    */
    public function addToSource($article_id, $source_name, $author, $location){
    	// body
    	$article_source 				= new ArticleSource();
    	$article_source->article_id 	= $article_id;
    	$article_source->source_name 	= $source_name;
    	$article_source->author 		= $author;
    	$article_source->location 		= $location;
    	$article_source->save();
    }		
}
