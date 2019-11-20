<?php

namespace EBN\Http\Controllers;

use Illuminate\Http\Request;
use EBN\Comment;

class CommentJsonController extends Controller
{
    /*
    |-----------------------------------------
    | ADD NEW COMMENTS
    |-----------------------------------------
    */
    public function addNewComment(Request $request){
    	// body
    	$add_comment = new Comment();
    	$data        = $add_comment->addComment($request);

    	// return response.
    	return response()->json($data);
    }

    /*
    |-----------------------------------------
    | GET ALL COMMENTS
    |-----------------------------------------
    */
    public function fetchAllComments(Request $request){
        // body
        $add_comment = new Comment();
        $data        = $add_comment->getViewerComments($request);

        // return response.
        return response()->json($data);
    }
}
