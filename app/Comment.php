<?php

namespace EBN;

use Illuminate\Database\Eloquent\Model;
use EBN\User;
use EBN\Auth;

class Comment extends Model
{
    /*
    |-----------------------------------------
    | RELATE COMMENTS TO USER
    |-----------------------------------------
    */
    public function user(){
        // body
        return $this->belongsTo(User::class, 'user_id');
    }

    /*
    |-----------------------------------------
    | ADD NEW COMMENTS
    |-----------------------------------------
    */
    public function addComment($payload){
    	// body
    	if($this->alreadyUser($payload->email)){
    		// get user information
    		$user = User::where("email", $payload->email)->first();

    		$new_comment          		= new Comment();
    		$new_comment->article_id 	= $payload->article_id;
    		$new_comment->user_id 		= $user->id;
    		$new_comment->message 		= $payload->message;
    		$new_comment->status  		= 0;
    		if($new_comment->save()){
    			$data = [
    				'status' 	=> 'success',
    				'message' 	=> 'Comment posted!'
    			];
    		}else{
    			$data = [
    				'status' 	=> 'error',
    				'message' 	=> 'Error posting comments'
    			];
    		}
    	}else{
    		// treat as new user
    		$user = $this->addAsNewUser($payload);

    		if($user !== null){
    			$new_comment          		= new Comment();
    			$new_comment->article_id 	= $payload->article_id;
	    		$new_comment->user_id 		= $user->id;
	    		$new_comment->message 		= $payload->message;
	    		$new_comment->status  		= 0;
	    		if($new_comment->save()){
	    			$data = [
	    				'status' 	=> 'success',
	    				'message' 	=> 'Comment posted!'
	    			];
	    		}else{
	    			$data = [
	    				'status' 	=> 'error',
	    				'message' 	=> 'Error posting comments'
	    			];
	    		}
    		}
    	}

    	// return
    	return $data;
    }

    /*
    |-----------------------------------------
    | GET USERS COMMENTS
    |-----------------------------------------
    */
    public function getViewerComments($payload){
        // body
        $comments = Comment::where('article_id', $payload->article_id)->get();
        $comments_box = [];
        foreach ($comments as $key => $value) {
            $user = User::where('id', $value->user_id)->first();
            $comment = [
                'id'            => $value->id,
                'message'       => $value->message,
                'name'          => $user->name,
                // 'avatar'    => $user->profile->avatar,
                'avatar'        => null,
                'status'        => $value->status,
                'created_at'    => $value->created_at->diffForHumans().' - '.$value->created_at->isoFormat("dddd D' Y"),
                'updated_at'    => $value->updated_at,
            ];

            array_push($comments_box, $comment);
        }

        return $comments_box;
    }

    /*
    |-----------------------------------------
    | CHECK ALREADY A USER ON EBN
    |-----------------------------------------
    */
    public function alreadyUser($email){
    	// body
    	$already_user = User::where("email", $email)->first();
    	if($already_user !== null){
    		return true;
    	}else{
    		return false;
    	}
    }

    /*
    |-----------------------------------------
    | CREATE NEW USER
    |-----------------------------------------
    */
    public function addAsNewUser($payload){
    	// body
    	$add_user 			= new User();
    	$add_user->name 	= $payload->name;
    	$add_user->email 	= $payload->email;
    	$add_user->password = bcrypt('password');
    	$add_user->save();

    	// return data
    	return $add_user;
    }
}
